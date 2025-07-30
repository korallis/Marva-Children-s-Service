#!/bin/bash

# MUVE WordPress Setup Script
# This script configures WordPress after Docker containers are running

echo "🚀 MUVE WordPress Setup Script"
echo "=============================="

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo -e "${RED}❌ Docker is not running. Please start Docker Desktop first.${NC}"
    exit 1
fi

# Start containers
echo -e "${YELLOW}Starting Docker containers...${NC}"
docker-compose up -d

# Wait for MySQL to be ready
echo -e "${YELLOW}Waiting for MySQL to be ready...${NC}"
until docker exec muve_mysql mysqladmin ping -h localhost --silent; do
    printf '.'
    sleep 2
done
echo -e "${GREEN}✓ MySQL is ready${NC}"

# Wait for WordPress to be ready
echo -e "${YELLOW}Waiting for WordPress to be ready...${NC}"
until curl -s -o /dev/null -w "%{http_code}" http://localhost:8080 | grep -q "200\|302"; do
    printf '.'
    sleep 2
done
echo -e "${GREEN}✓ WordPress is ready${NC}"

# Create wp-config optimizations
echo -e "${YELLOW}Applying WordPress optimizations...${NC}"

# Create advanced WordPress configuration
docker exec muve_wordpress bash -c 'cat > /var/www/html/wp-config-extra.php << "EOF"
<?php
// Performance optimizations
define("WP_CACHE", true);
define("WP_MEMORY_LIMIT", "256M");
define("WP_MAX_MEMORY_LIMIT", "512M");

// Security hardening
define("DISALLOW_FILE_EDIT", true);
define("DISALLOW_FILE_MODS", false);
define("FORCE_SSL_ADMIN", false); // Enable in production
define("WP_AUTO_UPDATE_CORE", "minor");

// Content optimizations
define("WP_POST_REVISIONS", 10);
define("AUTOSAVE_INTERVAL", 300);
define("EMPTY_TRASH_DAYS", 30);

// Debug settings (disable in production)
define("WP_DEBUG", true);
define("WP_DEBUG_LOG", true);
define("WP_DEBUG_DISPLAY", false);
define("SCRIPT_DEBUG", false);

// Disable automatic paragraph tags
define("WPLANG", "");

// Increase upload limits
@ini_set("upload_max_size", "100M");
@ini_set("post_max_size", "100M");
@ini_set("max_execution_time", "300");
EOF'

echo -e "${GREEN}✓ WordPress optimizations applied${NC}"

# Create .htaccess for permalinks
echo -e "${YELLOW}Creating .htaccess for permalinks...${NC}"
docker exec muve_wordpress bash -c 'cat > /var/www/html/.htaccess << "EOF"
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress

# Security Headers
<IfModule mod_headers.c>
Header set X-Content-Type-Options "nosniff"
Header set X-Frame-Options "SAMEORIGIN"
Header set X-XSS-Protection "1; mode=block"
</IfModule>

# Protect wp-config.php
<files wp-config.php>
order allow,deny
deny from all
</files>

# Disable directory browsing
Options -Indexes

# Compress files
<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/plain
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE text/css
AddOutputFilterByType DEFLATE application/xml
AddOutputFilterByType DEFLATE application/xhtml+xml
AddOutputFilterByType DEFLATE application/rss+xml
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>
EOF'

# Set correct permissions
docker exec muve_wordpress chown -R www-data:www-data /var/www/html
docker exec muve_wordpress chmod 644 /var/www/html/.htaccess

echo -e "${GREEN}✓ .htaccess created${NC}"

# Create MySQL optimization script
echo -e "${YELLOW}Optimizing MySQL configuration...${NC}"
docker exec muve_mysql mysql -u root -p${MYSQL_ROOT_PASSWORD:-muve_root_2024!} -e "
-- Optimize MySQL for WordPress
SET GLOBAL max_connections = 150;
SET GLOBAL max_allowed_packet = 64M;
SET GLOBAL innodb_buffer_pool_size = 256M;
SET GLOBAL innodb_log_file_size = 64M;
" 2>/dev/null || echo -e "${YELLOW}⚠ MySQL optimizations will be applied on next restart${NC}"

echo -e "${GREEN}✓ Setup complete!${NC}"
echo ""
echo "📋 Next Steps:"
echo "1. Visit http://localhost:8080 to complete WordPress installation"
echo "2. Use these recommended settings:"
echo "   - Site Title: MUVE Children's Services"
echo "   - Username: muve_admin"
echo "   - Password: [Choose a strong password]"
echo "   - Email: admin@muvechildrensservices.org"
echo ""
echo "3. phpMyAdmin is available at http://localhost:8081"
echo "   - Server: db"
echo "   - Username: muve_wp_user"
echo "   - Password: muve_wp_pass_2024!"
echo ""
echo "4. After installation, visit Settings > Permalinks and click Save to activate pretty URLs"