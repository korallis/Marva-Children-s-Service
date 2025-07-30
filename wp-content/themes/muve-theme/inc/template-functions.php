<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package MUVE_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function muve_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'muve_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function muve_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'muve_pingback_header');

/**
 * Changes the default excerpt more link
 */
function muve_excerpt_more_link($more) {
    global $post;
    return '<a class="more-link" href="' . esc_url(get_permalink($post->ID)) . '">' . __('Read More', 'muve-theme') . '</a>';
}
add_filter('excerpt_more', 'muve_excerpt_more_link');

/**
 * Add custom image sizes to media library
 */
function muve_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'muve-hero' => __('Hero Image', 'muve-theme'),
        'muve-card' => __('Card Image', 'muve-theme'),
        'muve-team' => __('Team Member', 'muve-theme'),
    ));
}
add_filter('image_size_names_choose', 'muve_custom_image_sizes');

/**
 * Remove inline width and height attributes from images
 */
function muve_remove_image_size_attributes($html) {
    return preg_replace('/(width|height)="\d*"/', '', $html);
}
add_filter('post_thumbnail_html', 'muve_remove_image_size_attributes');
add_filter('image_send_to_editor', 'muve_remove_image_size_attributes');

/**
 * Customize the login page
 */
function muve_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo.png);
            height: 100px;
            width: 300px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
        .login form {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .login input[type="submit"] {
            background-color: #FF6B35;
            border-color: #FF6B35;
            border-radius: 5px;
        }
        .login input[type="submit"]:hover {
            background-color: #e55a2b;
            border-color: #e55a2b;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'muve_login_logo');

/**
 * Change login logo URL
 */
function muve_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'muve_login_logo_url');

/**
 * Change login logo URL title
 */
function muve_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'muve_login_logo_url_title');