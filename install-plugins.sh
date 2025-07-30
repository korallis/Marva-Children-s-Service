#!/bin/bash

# MUVE WordPress Plugin Installation Script
# Installs and configures essential plugins

echo "🔌 MUVE WordPress Plugin Installation"
echo "===================================="

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

# Essential plugins to install
echo -e "${YELLOW}Installing essential plugins...${NC}"

# 1. Security: Wordfence
echo -e "${YELLOW}Installing Wordfence Security...${NC}"
docker exec muve_wordpress wp plugin install wordfence --activate --allow-root

# 2. SEO: Yoast SEO
echo -e "${YELLOW}Installing Yoast SEO...${NC}"
docker exec muve_wordpress wp plugin install wordpress-seo --activate --allow-root

# 3. Backup: UpdraftPlus
echo -e "${YELLOW}Installing UpdraftPlus Backup...${NC}"
docker exec muve_wordpress wp plugin install updraftplus --activate --allow-root

# 4. Performance: W3 Total Cache (alternative to WP Rocket which is premium)
echo -e "${YELLOW}Installing W3 Total Cache...${NC}"
docker exec muve_wordpress wp plugin install w3-total-cache --activate --allow-root

# 5. Forms: Contact Form 7
echo -e "${YELLOW}Installing Contact Form 7...${NC}"
docker exec muve_wordpress wp plugin install contact-form-7 --activate --allow-root

# 6. Additional recommended plugins
echo -e "${YELLOW}Installing additional recommended plugins...${NC}"

# Maintenance mode
docker exec muve_wordpress wp plugin install maintenance --allow-root

# Image optimization
docker exec muve_wordpress wp plugin install ewww-image-optimizer --activate --allow-root

# XML Sitemap (if not using Yoast's sitemap)
docker exec muve_wordpress wp plugin install google-sitemap-generator --allow-root

# Anti-spam
docker exec muve_wordpress wp plugin install akismet --allow-root

# Configure Wordfence basic settings
echo -e "${YELLOW}Configuring Wordfence...${NC}"
docker exec muve_wordpress wp option update wf_plugin_act '1' --allow-root
docker exec muve_wordpress wp option patch insert wordfence_options autoUpdate '1' --allow-root

# Configure Yoast SEO basic settings
echo -e "${YELLOW}Configuring Yoast SEO...${NC}"
docker exec muve_wordpress wp option patch insert wpseo company_name 'MUVE Children\'s Services' --allow-root
docker exec muve_wordpress wp option patch insert wpseo website_name 'MUVE Children\'s Services' --allow-root

# Configure Contact Form 7
echo -e "${YELLOW}Creating default contact form...${NC}"
docker exec muve_wordpress bash -c "wp post create \
    --post_type='wpcf7_contact_form' \
    --post_title='General Enquiry Form' \
    --post_status='publish' \
    --meta_input='{\"_form\":\"<label> Your Name (required)\\n[text* your-name] </label>\\n\\n<label> Your Email (required)\\n[email* your-email] </label>\\n\\n<label> Phone Number\\n[tel your-phone] </label>\\n\\n<label> Subject\\n[text your-subject] </label>\\n\\n<label> Your Message\\n[textarea your-message] </label>\\n\\n[submit \\\"Send Message\\\"]\",\"_mail\":{\"subject\":\"MUVE Website Enquiry: [your-subject]\",\"sender\":\"[your-name] <[your-email]>\",\"body\":\"From: [your-name] <[your-email]>\\nPhone: [your-phone]\\nSubject: [your-subject]\\n\\nMessage:\\n[your-message]\",\"recipient\":\"admin@muvechildrensservices.org\",\"additional_headers\":\"Reply-To: [your-email]\",\"attachments\":\"\",\"use_html\":false,\"exclude_blank\":false}}' \
    --allow-root"

# Set up UpdraftPlus basic settings
echo -e "${YELLOW}Configuring UpdraftPlus...${NC}"
docker exec muve_wordpress wp option update updraft_interval 'weekly' --allow-root
docker exec muve_wordpress wp option update updraft_interval_database 'weekly' --allow-root
docker exec muve_wordpress wp option update updraft_retain '4' --allow-root
docker exec muve_wordpress wp option update updraft_retain_db '4' --allow-root

# Create mu-plugins directory for must-use plugins
echo -e "${YELLOW}Creating mu-plugins directory...${NC}"
docker exec muve_wordpress mkdir -p /var/www/html/wp-content/mu-plugins

# Create a must-use plugin for essential configurations
docker exec muve_wordpress bash -c 'cat > /var/www/html/wp-content/mu-plugins/muve-essentials.php << "EOF"
<?php
/**
 * Plugin Name: MUVE Essential Configurations
 * Description: Core configurations for MUVE Children\'s Services website
 * Version: 1.0
 * Author: MUVE Development Team
 */

// Disable plugin and theme file editor
if (!defined("DISALLOW_FILE_EDIT")) {
    define("DISALLOW_FILE_EDIT", true);
}

// Set autosave interval
if (!defined("AUTOSAVE_INTERVAL")) {
    define("AUTOSAVE_INTERVAL", 300);
}

// Limit post revisions
if (!defined("WP_POST_REVISIONS")) {
    define("WP_POST_REVISIONS", 10);
}

// Increase memory limit if needed
if (!defined("WP_MEMORY_LIMIT")) {
    define("WP_MEMORY_LIMIT", "256M");
}

// Disable automatic updates for dev environment
if (defined("ENVIRONMENT") && ENVIRONMENT === "development") {
    add_filter("automatic_updater_disabled", "__return_true");
}

// Remove WordPress version from head
remove_action("wp_head", "wp_generator");

// Disable XML-RPC
add_filter("xmlrpc_enabled", "__return_false");

// Remove various WordPress headers for security
remove_action("wp_head", "rsd_link");
remove_action("wp_head", "wlwmanifest_link");
remove_action("wp_head", "wp_shortlink_wp_head");
remove_action("wp_head", "rest_output_link_wp_head");
remove_action("wp_head", "wp_oembed_add_discovery_links");
EOF'

# Fix permissions
docker exec muve_wordpress chown -R www-data:www-data /var/www/html/wp-content

echo -e "${GREEN}✓ Plugin installation complete!${NC}"
echo ""
echo "📋 Installed Plugins:"
echo "✓ Wordfence Security - Firewall & malware scanner"
echo "✓ Yoast SEO - Search engine optimization"
echo "✓ UpdraftPlus - Backup solution"
echo "✓ W3 Total Cache - Performance optimization"
echo "✓ Contact Form 7 - Contact forms"
echo "✓ EWWW Image Optimizer - Image optimization"
echo ""
echo "⚠️  Next Steps:"
echo "1. Configure Akismet with API key for spam protection"
echo "2. Set up backup destination in UpdraftPlus"
echo "3. Configure W3 Total Cache settings"
echo "4. Complete Yoast SEO setup wizard"
echo ""
echo "Note: WP Rocket is a premium plugin. W3 Total Cache is installed as a free alternative."