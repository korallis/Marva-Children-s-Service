<?php
/**
 * MUVE Children's Services Theme Functions
 *
 * @package MUVE_Theme
 * @since 1.0.0
 */

// Define theme constants
define('MUVE_THEME_VERSION', '1.0.0');
define('MUVE_THEME_DIR', get_template_directory());
define('MUVE_THEME_URI', get_template_directory_uri());

/**
 * Theme setup
 */
function muve_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Add custom image sizes
    add_image_size('muve-hero', 1920, 800, true);
    add_image_size('muve-card', 400, 300, true);
    add_image_size('muve-team', 300, 300, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'muve-theme'),
        'footer' => esc_html__('Footer Menu', 'muve-theme'),
        'mobile' => esc_html__('Mobile Menu', 'muve-theme'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for wide alignment
    add_theme_support('align-wide');

    // Add support for block styles
    add_theme_support('wp-block-styles');
}
add_action('after_setup_theme', 'muve_theme_setup');

/**
 * Set the content width
 */
function muve_content_width() {
    $GLOBALS['content_width'] = apply_filters('muve_content_width', 1200);
}
add_action('after_setup_theme', 'muve_content_width', 0);

/**
 * Register widget areas
 */
function muve_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'muve-theme'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'muve-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 1', 'muve-theme'),
        'id' => 'footer-1',
        'description' => esc_html__('Footer widget area column 1', 'muve-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 2', 'muve-theme'),
        'id' => 'footer-2',
        'description' => esc_html__('Footer widget area column 2', 'muve-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 3', 'muve-theme'),
        'id' => 'footer-3',
        'description' => esc_html__('Footer widget area column 3', 'muve-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 4', 'muve-theme'),
        'id' => 'footer-4',
        'description' => esc_html__('Footer widget area column 4', 'muve-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'muve_widgets_init');

/**
 * Enqueue scripts and styles
 */
function muve_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('muve-style', get_stylesheet_uri(), array(), MUVE_THEME_VERSION);
    
    // Enqueue main theme styles
    wp_enqueue_style('muve-main', MUVE_THEME_URI . '/assets/css/main.css', array(), MUVE_THEME_VERSION);
    
    // Enqueue Google Fonts
    wp_enqueue_style('muve-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Nunito:wght@300;400;600;700&display=swap', array(), null);
    
    // Enqueue navigation script
    wp_enqueue_script('muve-navigation', MUVE_THEME_URI . '/assets/js/navigation.js', array(), MUVE_THEME_VERSION, true);
    
    // Enqueue main theme script
    wp_enqueue_script('muve-script', MUVE_THEME_URI . '/assets/js/main.js', array('jquery'), MUVE_THEME_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('muve-script', 'muve_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('muve_ajax_nonce'),
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'muve_scripts');

/**
 * Custom template tags for this theme
 */
require MUVE_THEME_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress
 */
require MUVE_THEME_DIR . '/inc/template-functions.php';

/**
 * Customizer additions
 */
require MUVE_THEME_DIR . '/inc/customizer.php';

/**
 * Load custom post types
 */
require MUVE_THEME_DIR . '/inc/custom-post-types.php';

/**
 * Load custom taxonomies
 */
require MUVE_THEME_DIR . '/inc/custom-taxonomies.php';
require MUVE_THEME_DIR . '/inc/brand-assets.php';

/**
 * MUVE Brand Colors
 */
function muve_custom_colors() {
    ?>
    <style>
        :root {
            --muve-orange: #FF6B35;
            --muve-blue: #4ECDC4;
            --muve-yellow: #FFE66D;
            --muve-light-blue: #A8DADC;
            --muve-dark-blue: #1D3557;
            --muve-white: #FFFFFF;
            --muve-light-gray: #F8F9FA;
            --muve-gray: #6C757D;
            --muve-dark-gray: #343A40;
            --muve-black: #000000;
        }
    </style>
    <?php
}
add_action('wp_head', 'muve_custom_colors');

/**
 * Disable emojis for better performance
 */
function muve_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'muve_disable_emojis');

/**
 * Security headers
 */
function muve_security_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: no-referrer-when-downgrade');
}
add_action('send_headers', 'muve_security_headers');

/**
 * Custom excerpt length
 */
function muve_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'muve_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function muve_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'muve_excerpt_more');