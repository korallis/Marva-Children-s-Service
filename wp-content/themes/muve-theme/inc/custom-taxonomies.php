<?php
/**
 * Custom Taxonomies
 *
 * @package MUVE_Theme
 */

/**
 * Register Custom Taxonomies
 */
function muve_register_custom_taxonomies() {

    // Service Categories
    $labels = array(
        'name' => _x('Service Categories', 'Taxonomy General Name', 'muve-theme'),
        'singular_name' => _x('Service Category', 'Taxonomy Singular Name', 'muve-theme'),
        'menu_name' => __('Service Categories', 'muve-theme'),
        'all_items' => __('All Categories', 'muve-theme'),
        'parent_item' => __('Parent Category', 'muve-theme'),
        'parent_item_colon' => __('Parent Category:', 'muve-theme'),
        'new_item_name' => __('New Category Name', 'muve-theme'),
        'add_new_item' => __('Add New Category', 'muve-theme'),
        'edit_item' => __('Edit Category', 'muve-theme'),
        'update_item' => __('Update Category', 'muve-theme'),
        'view_item' => __('View Category', 'muve-theme'),
        'separate_items_with_commas' => __('Separate categories with commas', 'muve-theme'),
        'add_or_remove_items' => __('Add or remove categories', 'muve-theme'),
        'choose_from_most_used' => __('Choose from the most used', 'muve-theme'),
        'popular_items' => __('Popular Categories', 'muve-theme'),
        'search_items' => __('Search Categories', 'muve-theme'),
        'not_found' => __('Not Found', 'muve-theme'),
        'no_terms' => __('No categories', 'muve-theme'),
        'items_list' => __('Categories list', 'muve-theme'),
        'items_list_navigation' => __('Categories list navigation', 'muve-theme'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service-category'),
    );
    register_taxonomy('service_category', array('muve_service'), $args);

    // Resource Categories
    $labels = array(
        'name' => _x('Resource Categories', 'Taxonomy General Name', 'muve-theme'),
        'singular_name' => _x('Resource Category', 'Taxonomy Singular Name', 'muve-theme'),
        'menu_name' => __('Resource Categories', 'muve-theme'),
        'all_items' => __('All Categories', 'muve-theme'),
        'parent_item' => __('Parent Category', 'muve-theme'),
        'parent_item_colon' => __('Parent Category:', 'muve-theme'),
        'new_item_name' => __('New Category Name', 'muve-theme'),
        'add_new_item' => __('Add New Category', 'muve-theme'),
        'edit_item' => __('Edit Category', 'muve-theme'),
        'update_item' => __('Update Category', 'muve-theme'),
        'view_item' => __('View Category', 'muve-theme'),
        'separate_items_with_commas' => __('Separate categories with commas', 'muve-theme'),
        'add_or_remove_items' => __('Add or remove categories', 'muve-theme'),
        'choose_from_most_used' => __('Choose from the most used', 'muve-theme'),
        'popular_items' => __('Popular Categories', 'muve-theme'),
        'search_items' => __('Search Categories', 'muve-theme'),
        'not_found' => __('Not Found', 'muve-theme'),
        'no_terms' => __('No categories', 'muve-theme'),
        'items_list' => __('Categories list', 'muve-theme'),
        'items_list_navigation' => __('Categories list navigation', 'muve-theme'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'resource-category'),
    );
    register_taxonomy('resource_category', array('muve_resource'), $args);

    // Age Groups Taxonomy (for Services)
    $labels = array(
        'name' => _x('Age Groups', 'Taxonomy General Name', 'muve-theme'),
        'singular_name' => _x('Age Group', 'Taxonomy Singular Name', 'muve-theme'),
        'menu_name' => __('Age Groups', 'muve-theme'),
        'all_items' => __('All Age Groups', 'muve-theme'),
        'parent_item' => __('Parent Age Group', 'muve-theme'),
        'parent_item_colon' => __('Parent Age Group:', 'muve-theme'),
        'new_item_name' => __('New Age Group Name', 'muve-theme'),
        'add_new_item' => __('Add New Age Group', 'muve-theme'),
        'edit_item' => __('Edit Age Group', 'muve-theme'),
        'update_item' => __('Update Age Group', 'muve-theme'),
        'view_item' => __('View Age Group', 'muve-theme'),
        'search_items' => __('Search Age Groups', 'muve-theme'),
        'not_found' => __('Not Found', 'muve-theme'),
        'no_terms' => __('No age groups', 'muve-theme'),
        'items_list' => __('Age Groups list', 'muve-theme'),
        'items_list_navigation' => __('Age Groups list navigation', 'muve-theme'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'age-group'),
    );
    register_taxonomy('age_group', array('muve_service'), $args);

}
add_action('init', 'muve_register_custom_taxonomies', 0);

/**
 * Pre-populate taxonomies with default terms
 */
function muve_insert_default_terms() {
    
    // Service Categories
    $service_categories = array(
        'Residential Care',
        'Foster Care',
        'Day Services',
        'Emergency Care',
        'Therapeutic Services',
        'Educational Support',
        'Family Support',
    );

    foreach ($service_categories as $category) {
        if (!term_exists($category, 'service_category')) {
            wp_insert_term($category, 'service_category');
        }
    }

    // Resource Categories
    $resource_categories = array(
        'Parent Guides',
        'Professional Resources',
        'Forms & Documents',
        'Educational Materials',
        'Policy Documents',
        'Training Materials',
    );

    foreach ($resource_categories as $category) {
        if (!term_exists($category, 'resource_category')) {
            wp_insert_term($category, 'resource_category');
        }
    }

    // Age Groups
    $age_groups = array(
        '0-5 years',
        '6-11 years',
        '12-15 years',
        '16-18 years',
        'All ages',
    );

    foreach ($age_groups as $age_group) {
        if (!term_exists($age_group, 'age_group')) {
            wp_insert_term($age_group, 'age_group');
        }
    }
}
add_action('init', 'muve_insert_default_terms');