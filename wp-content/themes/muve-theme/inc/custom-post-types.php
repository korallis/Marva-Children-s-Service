<?php
/**
 * Custom Post Types
 *
 * @package MUVE_Theme
 */

/**
 * Register Custom Post Types
 */
function muve_register_custom_post_types() {
    
    // Services Post Type
    $labels = array(
        'name' => _x('Services', 'Post Type General Name', 'muve-theme'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'muve-theme'),
        'menu_name' => __('Services', 'muve-theme'),
        'name_admin_bar' => __('Service', 'muve-theme'),
        'archives' => __('Service Archives', 'muve-theme'),
        'attributes' => __('Service Attributes', 'muve-theme'),
        'parent_item_colon' => __('Parent Service:', 'muve-theme'),
        'all_items' => __('All Services', 'muve-theme'),
        'add_new_item' => __('Add New Service', 'muve-theme'),
        'add_new' => __('Add New', 'muve-theme'),
        'new_item' => __('New Service', 'muve-theme'),
        'edit_item' => __('Edit Service', 'muve-theme'),
        'update_item' => __('Update Service', 'muve-theme'),
        'view_item' => __('View Service', 'muve-theme'),
        'view_items' => __('View Services', 'muve-theme'),
        'search_items' => __('Search Service', 'muve-theme'),
        'not_found' => __('Not found', 'muve-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'muve-theme'),
        'featured_image' => __('Featured Image', 'muve-theme'),
        'set_featured_image' => __('Set featured image', 'muve-theme'),
        'remove_featured_image' => __('Remove featured image', 'muve-theme'),
        'use_featured_image' => __('Use as featured image', 'muve-theme'),
        'insert_into_item' => __('Insert into service', 'muve-theme'),
        'uploaded_to_this_item' => __('Uploaded to this service', 'muve-theme'),
        'items_list' => __('Services list', 'muve-theme'),
        'items_list_navigation' => __('Services list navigation', 'muve-theme'),
        'filter_items_list' => __('Filter services list', 'muve-theme'),
    );
    $args = array(
        'label' => __('Service', 'muve-theme'),
        'description' => __('MUVE Children\'s Services', 'muve-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'),
        'taxonomies' => array('service_category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-heart',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'services'),
    );
    register_post_type('muve_service', $args);

    // Team Members Post Type
    $labels = array(
        'name' => _x('Team Members', 'Post Type General Name', 'muve-theme'),
        'singular_name' => _x('Team Member', 'Post Type Singular Name', 'muve-theme'),
        'menu_name' => __('Team', 'muve-theme'),
        'name_admin_bar' => __('Team Member', 'muve-theme'),
        'archives' => __('Team Archives', 'muve-theme'),
        'all_items' => __('All Team Members', 'muve-theme'),
        'add_new_item' => __('Add New Team Member', 'muve-theme'),
        'add_new' => __('Add New', 'muve-theme'),
        'new_item' => __('New Team Member', 'muve-theme'),
        'edit_item' => __('Edit Team Member', 'muve-theme'),
        'update_item' => __('Update Team Member', 'muve-theme'),
        'view_item' => __('View Team Member', 'muve-theme'),
        'view_items' => __('View Team Members', 'muve-theme'),
        'search_items' => __('Search Team Member', 'muve-theme'),
        'not_found' => __('Not found', 'muve-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'muve-theme'),
    );
    $args = array(
        'label' => __('Team Member', 'muve-theme'),
        'description' => __('MUVE Team Members', 'muve-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'team'),
    );
    register_post_type('muve_team', $args);

    // Testimonials Post Type
    $labels = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'muve-theme'),
        'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'muve-theme'),
        'menu_name' => __('Testimonials', 'muve-theme'),
        'name_admin_bar' => __('Testimonial', 'muve-theme'),
        'all_items' => __('All Testimonials', 'muve-theme'),
        'add_new_item' => __('Add New Testimonial', 'muve-theme'),
        'add_new' => __('Add New', 'muve-theme'),
        'new_item' => __('New Testimonial', 'muve-theme'),
        'edit_item' => __('Edit Testimonial', 'muve-theme'),
        'update_item' => __('Update Testimonial', 'muve-theme'),
        'view_item' => __('View Testimonial', 'muve-theme'),
        'search_items' => __('Search Testimonial', 'muve-theme'),
    );
    $args = array(
        'label' => __('Testimonial', 'muve-theme'),
        'description' => __('Client Testimonials', 'muve-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-format-quote',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );
    register_post_type('muve_testimonial', $args);

    // Resources Post Type
    $labels = array(
        'name' => _x('Resources', 'Post Type General Name', 'muve-theme'),
        'singular_name' => _x('Resource', 'Post Type Singular Name', 'muve-theme'),
        'menu_name' => __('Resources', 'muve-theme'),
        'name_admin_bar' => __('Resource', 'muve-theme'),
        'all_items' => __('All Resources', 'muve-theme'),
        'add_new_item' => __('Add New Resource', 'muve-theme'),
        'add_new' => __('Add New', 'muve-theme'),
        'new_item' => __('New Resource', 'muve-theme'),
        'edit_item' => __('Edit Resource', 'muve-theme'),
        'update_item' => __('Update Resource', 'muve-theme'),
        'view_item' => __('View Resource', 'muve-theme'),
        'search_items' => __('Search Resource', 'muve-theme'),
    );
    $args = array(
        'label' => __('Resource', 'muve-theme'),
        'description' => __('Downloadable Resources', 'muve-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies' => array('resource_category'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-media-document',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'resources'),
    );
    register_post_type('muve_resource', $args);

}
add_action('init', 'muve_register_custom_post_types', 0);