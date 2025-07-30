<?php
/**
 * MUVE Theme Customizer
 *
 * @package MUVE_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function muve_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector' => '.site-title a',
                'render_callback' => 'muve_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector' => '.site-description',
                'render_callback' => 'muve_customize_partial_blogdescription',
            )
        );
    }

    // MUVE Brand Colors Section
    $wp_customize->add_section('muve_colors', array(
        'title' => __('MUVE Brand Colors', 'muve-theme'),
        'priority' => 30,
    ));

    // Primary Color (Orange)
    $wp_customize->add_setting('muve_primary_color', array(
        'default' => '#FF6B35',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'muve_primary_color', array(
        'label' => __('Primary Color (Orange)', 'muve-theme'),
        'section' => 'muve_colors',
    )));

    // Secondary Color (Blue)
    $wp_customize->add_setting('muve_secondary_color', array(
        'default' => '#4ECDC4',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'muve_secondary_color', array(
        'label' => __('Secondary Color (Blue)', 'muve-theme'),
        'section' => 'muve_colors',
    )));

    // Accent Color (Yellow)
    $wp_customize->add_setting('muve_accent_color', array(
        'default' => '#FFE66D',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'muve_accent_color', array(
        'label' => __('Accent Color (Yellow)', 'muve-theme'),
        'section' => 'muve_colors',
    )));

    // Contact Information Section
    $wp_customize->add_section('muve_contact', array(
        'title' => __('Contact Information', 'muve-theme'),
        'priority' => 40,
    ));

    // Phone Number
    $wp_customize->add_setting('muve_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('muve_phone', array(
        'label' => __('Phone Number', 'muve-theme'),
        'section' => 'muve_contact',
        'type' => 'text',
    ));

    // Emergency Phone
    $wp_customize->add_setting('muve_emergency_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('muve_emergency_phone', array(
        'label' => __('Emergency Phone Number', 'muve-theme'),
        'section' => 'muve_contact',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('muve_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('muve_email', array(
        'label' => __('Email Address', 'muve-theme'),
        'section' => 'muve_contact',
        'type' => 'email',
    ));

    // Social Media Section
    $wp_customize->add_section('muve_social', array(
        'title' => __('Social Media', 'muve-theme'),
        'priority' => 50,
    ));

    // Facebook
    $wp_customize->add_setting('muve_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('muve_facebook', array(
        'label' => __('Facebook URL', 'muve-theme'),
        'section' => 'muve_social',
        'type' => 'url',
    ));

    // Twitter
    $wp_customize->add_setting('muve_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('muve_twitter', array(
        'label' => __('Twitter URL', 'muve-theme'),
        'section' => 'muve_social',
        'type' => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('muve_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('muve_linkedin', array(
        'label' => __('LinkedIn URL', 'muve-theme'),
        'section' => 'muve_social',
        'type' => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('muve_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('muve_instagram', array(
        'label' => __('Instagram URL', 'muve-theme'),
        'section' => 'muve_social',
        'type' => 'url',
    ));
}
add_action('customize_register', 'muve_customize_register');

/**
 * Render the site title for the selective refresh partial.
 */
function muve_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function muve_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function muve_customize_preview_js() {
    wp_enqueue_script('muve-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), MUVE_THEME_VERSION, true);
}
add_action('customize_preview_init', 'muve_customize_preview_js');