#!/bin/bash

# WP-CLI Setup Script for MUVE WordPress
# Run this after Docker containers are running to automate WordPress setup

echo "🔧 MUVE WordPress WP-CLI Setup"
echo "=============================="

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Load environment variables
if [ -f .env ]; then
    export $(cat .env | grep -v '^#' | xargs)
fi

# Install WP-CLI in WordPress container
echo -e "${YELLOW}Installing WP-CLI...${NC}"
docker exec muve_wordpress bash -c '
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/local/bin/wp
'

# Wait for database
echo -e "${YELLOW}Waiting for database...${NC}"
until docker exec muve_wordpress wp db check --allow-root 2>/dev/null; do
    printf '.'
    sleep 2
done
echo -e "${GREEN}✓ Database ready${NC}"

# Install WordPress
echo -e "${YELLOW}Installing WordPress...${NC}"
docker exec muve_wordpress wp core install \
    --url="http://localhost:8080" \
    --title="MUVE Children's Services" \
    --admin_user="muve_admin" \
    --admin_password="Muve2024!Admin" \
    --admin_email="admin@muvechildrensservices.org" \
    --skip-email \
    --allow-root

# Set permalink structure
echo -e "${YELLOW}Configuring permalinks...${NC}"
docker exec muve_wordpress wp rewrite structure '/%postname%/' --allow-root
docker exec muve_wordpress wp rewrite flush --allow-root

# Update site settings
echo -e "${YELLOW}Updating site settings...${NC}"
docker exec muve_wordpress wp option update timezone_string 'Europe/London' --allow-root
docker exec muve_wordpress wp option update date_format 'd/m/Y' --allow-root
docker exec muve_wordpress wp option update time_format 'H:i' --allow-root
docker exec muve_wordpress wp option update start_of_week '1' --allow-root
docker exec muve_wordpress wp option update blog_public '0' --allow-root # Discourage search engines (dev)

# Set site description
docker exec muve_wordpress wp option update blogdescription 'Specialist Children\'s Services - Supporting Young Lives' --allow-root

# Create default pages
echo -e "${YELLOW}Creating default pages...${NC}"
docker exec muve_wordpress wp post create --post_type=page --post_title='Home' --post_status=publish --post_name='home' --allow-root
docker exec muve_wordpress wp post create --post_type=page --post_title='About Us' --post_status=publish --post_name='about' --allow-root
docker exec muve_wordpress wp post create --post_type=page --post_title='Our Services' --post_status=publish --post_name='services' --allow-root
docker exec muve_wordpress wp post create --post_type=page --post_title='Contact' --post_status=publish --post_name='contact' --allow-root
docker exec muve_wordpress wp post create --post_type=page --post_title='Privacy Policy' --post_status=publish --post_name='privacy-policy' --allow-root

# Set homepage
HOME_ID=$(docker exec muve_wordpress wp post list --post_type=page --post_status=publish --field=ID --name=home --allow-root)
docker exec muve_wordpress wp option update page_on_front $HOME_ID --allow-root
docker exec muve_wordpress wp option update show_on_front 'page' --allow-root

# Delete default content
echo -e "${YELLOW}Cleaning default content...${NC}"
docker exec muve_wordpress wp post delete 1 --force --allow-root # Hello World
docker exec muve_wordpress wp post delete 2 --force --allow-root # Sample Page
docker exec muve_wordpress wp post delete 3 --force --allow-root # Privacy Policy (default)

# Fix permissions
docker exec muve_wordpress chown -R www-data:www-data /var/www/html

echo -e "${GREEN}✓ WordPress installation complete!${NC}"
echo ""
echo "📋 Access Details:"
echo "Website: http://localhost:8080"
echo "Admin: http://localhost:8080/wp-admin"
echo "Username: muve_admin"
echo "Password: Muve2024!Admin"
echo ""
echo "⚠️  IMPORTANT: Change the admin password after first login!"