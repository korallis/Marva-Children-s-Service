#!/bin/bash

# MUVE Theme Activation Script
# Activates the custom theme after Docker containers are running

echo "🎨 MUVE Theme Activation"
echo "======================="

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Check if containers are running
if ! docker exec muve_wordpress echo "Container running" > /dev/null 2>&1; then
    echo -e "${RED}❌ WordPress container is not running. Please run ./setup-wordpress.sh first.${NC}"
    exit 1
fi

# Activate MUVE theme
echo -e "${YELLOW}Activating MUVE theme...${NC}"
docker exec muve_wordpress wp theme activate muve-theme --allow-root

# Create default menus
echo -e "${YELLOW}Creating navigation menus...${NC}"
docker exec muve_wordpress wp menu create "Primary Menu" --allow-root
docker exec muve_wordpress wp menu create "Footer Menu" --allow-root
docker exec muve_wordpress wp menu create "Mobile Menu" --allow-root

# Assign menus to locations
docker exec muve_wordpress wp menu location assign "Primary Menu" primary --allow-root
docker exec muve_wordpress wp menu location assign "Footer Menu" footer --allow-root
docker exec muve_wordpress wp menu location assign "Mobile Menu" mobile --allow-root

# Add items to primary menu
echo -e "${YELLOW}Adding menu items...${NC}"
docker exec muve_wordpress bash -c '
HOME_ID=$(wp post list --post_type=page --name=home --field=ID --allow-root)
ABOUT_ID=$(wp post list --post_type=page --name=about --field=ID --allow-root)
SERVICES_ID=$(wp post list --post_type=page --name=services --field=ID --allow-root)
CONTACT_ID=$(wp post list --post_type=page --name=contact --field=ID --allow-root)

wp menu item add-post "Primary Menu" $HOME_ID --allow-root
wp menu item add-post "Primary Menu" $ABOUT_ID --allow-root
wp menu item add-post "Primary Menu" $SERVICES_ID --allow-root
wp menu item add-post "Primary Menu" $CONTACT_ID --allow-root
'

# Add items to footer menu
docker exec muve_wordpress bash -c '
PRIVACY_ID=$(wp post list --post_type=page --name=privacy-policy --field=ID --allow-root)
CONTACT_ID=$(wp post list --post_type=page --name=contact --field=ID --allow-root)

wp menu item add-post "Footer Menu" $PRIVACY_ID --allow-root
wp menu item add-post "Footer Menu" $CONTACT_ID --allow-root
wp menu item add-custom "Footer Menu" "Terms of Service" "#" --allow-root
wp menu item add-custom "Footer Menu" "Accessibility" "#" --allow-root
'

# Set up widgets
echo -e "${YELLOW}Setting up widgets...${NC}"
docker exec muve_wordpress wp widget add text footer-1 --title="About MUVE" --text="MUVE Children's Services provides specialist care and support for young people, helping them achieve their full potential in a safe and nurturing environment." --allow-root

docker exec muve_wordpress wp widget add text footer-2 --title="Contact Us" --text="<p><strong>24/7 Support Line:</strong><br>0800 123 4567</p><p><strong>Email:</strong><br>info@muvechildrensservices.org</p>" --allow-root

docker exec muve_wordpress wp widget add text footer-3 --title="Quick Links" --text="<ul><li><a href='/services'>Our Services</a></li><li><a href='/about'>About Us</a></li><li><a href='/resources'>Resources</a></li><li><a href='/contact'>Contact</a></li></ul>" --allow-root

docker exec muve_wordpress wp widget add text footer-4 --title="Follow Us" --text="<p>Stay connected with MUVE Children's Services</p><p>[Social media icons will go here]</p>" --allow-root

# Create sample service posts
echo -e "${YELLOW}Creating sample content...${NC}"
docker exec muve_wordpress wp post create --post_type=muve_service --post_title="Residential Care" --post_content="Our residential care services provide 24/7 support in a home-like environment for young people who need intensive care and support." --post_status=publish --allow-root

docker exec muve_wordpress wp post create --post_type=muve_service --post_title="Therapeutic Support" --post_content="Specialist therapeutic interventions designed to help young people process trauma and develop healthy coping mechanisms." --post_status=publish --allow-root

docker exec muve_wordpress wp post create --post_type=muve_service --post_title="Education Support" --post_content="Working with schools and education providers to ensure every young person in our care receives the education they deserve." --post_status=publish --allow-root

# Copy brand assets
echo -e "${YELLOW}Copying brand assets...${NC}"
docker exec muve_wordpress mkdir -p /var/www/html/wp-content/themes/muve-theme/assets/images/brand
docker cp "/Users/leebarry/Documents/Code-Projects/Muve Childrens Service/Brand & Assets/Logos/Untitled-1.png" muve_wordpress:/var/www/html/wp-content/themes/muve-theme/assets/images/logo.png 2>/dev/null || echo "Logo copy skipped"

# Fix permissions
docker exec muve_wordpress chown -R www-data:www-data /var/www/html/wp-content/themes

echo -e "${GREEN}✓ Theme activation complete!${NC}"
echo ""
echo "📋 Theme Details:"
echo "- Theme: MUVE Children's Services Theme"
echo "- Custom Post Types: Services, Team, Testimonials, Resources"
echo "- Menus: Primary, Footer, Mobile"
echo "- Widgets: Footer areas configured"
echo ""
echo "🎨 Next Steps:"
echo "1. Visit http://localhost:8080 to see your theme"
echo "2. Customize colors and settings in Appearance > Customize"
echo "3. Add your content and media"
echo "4. Install npm dependencies in the theme folder for development"