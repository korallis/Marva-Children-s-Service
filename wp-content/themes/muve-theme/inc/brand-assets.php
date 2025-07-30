<?php
/**
 * MUVE Brand Assets Management
 *
 * @package MUVE_Theme
 */

/**
 * Setup favicon and touch icons
 */
function muve_add_favicon() {
    $favicon_path = get_template_directory_uri() . '/assets/images/brand/';
    ?>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url($favicon_path . 'favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($favicon_path . 'favicon-16x16.png'); ?>">
    
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($favicon_path . 'apple-touch-icon.png'); ?>">
    
    <!-- Android Chrome Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url($favicon_path . 'android-chrome-192x192.png'); ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo esc_url($favicon_path . 'android-chrome-512x512.png'); ?>">
    
    <!-- Web App Manifest -->
    <link rel="manifest" href="<?php echo esc_url(get_template_directory_uri() . '/site.webmanifest'); ?>">
    
    <!-- Browser Theme Color -->
    <meta name="theme-color" content="#FF6B35">
    <meta name="msapplication-TileColor" content="#FF6B35">
    <?php
}
add_action('wp_head', 'muve_add_favicon');

/**
 * Add custom logo support
 */
function muve_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 300,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => false,
    );
    
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'muve_custom_logo_setup');

/**
 * Get MUVE logo by color variation
 *
 * @param string $color Logo color variation (orange, blue, black, white)
 * @param string $size Logo size (small, medium, large)
 * @return string HTML img tag
 */
function muve_get_logo($color = 'orange', $size = 'medium') {
    $logo_path = get_template_directory_uri() . '/assets/images/logos/';
    $logo_file = 'muve-logo-' . $color . '.svg';
    
    $sizes = array(
        'small'  => 'logo-container--small',
        'medium' => 'logo-container--medium',
        'large'  => 'logo-container--large'
    );
    
    $size_class = isset($sizes[$size]) ? $sizes[$size] : $sizes['medium'];
    
    $logo_html = sprintf(
        '<img src="%s" alt="%s" class="logo-container %s">',
        esc_url($logo_path . $logo_file),
        esc_attr(get_bloginfo('name') . ' - ' . get_bloginfo('description')),
        esc_attr($size_class)
    );
    
    return $logo_html;
}

/**
 * Output MUVE logo
 */
function muve_logo($color = 'orange', $size = 'medium') {
    echo muve_get_logo($color, $size);
}

/**
 * Add custom CSS properties to admin
 */
function muve_admin_brand_colors() {
    ?>
    <style>
        :root {
            --muve-orange: #FF6B35;
            --muve-blue: #4ECDC4;
            --muve-yellow: #FFE66D;
            --muve-light-blue: #A8DADC;
            --muve-dark-blue: #1D3557;
        }
        
        /* Customize admin bar */
        #wpadminbar {
            background-color: var(--muve-dark-blue);
        }
        
        /* Customize admin buttons */
        .wp-core-ui .button-primary {
            background-color: var(--muve-orange);
            border-color: var(--muve-orange);
        }
        
        .wp-core-ui .button-primary:hover {
            background-color: #E64C16;
            border-color: #E64C16;
        }
    </style>
    <?php
}
add_action('admin_head', 'muve_admin_brand_colors');

/**
 * Register brand color palette for Gutenberg
 */
function muve_gutenberg_color_palette() {
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('MUVE Orange', 'muve-theme'),
            'slug'  => 'muve-orange',
            'color' => '#FF6B35',
        ),
        array(
            'name'  => __('MUVE Blue', 'muve-theme'),
            'slug'  => 'muve-blue',
            'color' => '#4ECDC4',
        ),
        array(
            'name'  => __('MUVE Yellow', 'muve-theme'),
            'slug'  => 'muve-yellow',
            'color' => '#FFE66D',
        ),
        array(
            'name'  => __('MUVE Light Blue', 'muve-theme'),
            'slug'  => 'muve-light-blue',
            'color' => '#A8DADC',
        ),
        array(
            'name'  => __('MUVE Dark Blue', 'muve-theme'),
            'slug'  => 'muve-dark-blue',
            'color' => '#1D3557',
        ),
        array(
            'name'  => __('White', 'muve-theme'),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => __('Light Gray', 'muve-theme'),
            'slug'  => 'light-gray',
            'color' => '#F8F9FA',
        ),
        array(
            'name'  => __('Dark Gray', 'muve-theme'),
            'slug'  => 'dark-gray',
            'color' => '#343A40',
        ),
    ));
}
add_action('after_setup_theme', 'muve_gutenberg_color_palette');