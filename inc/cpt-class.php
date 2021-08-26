<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('WCDCustomPosts')) {
    class WCDCustomPosts
    {
        private $theme_cpt_settings;

        public function __construct()
        {
            add_action('init', array($this, 'portfolio'), 0);
        }

        public function portfolio()
        {

            $labels = array(
                'name' => _x('Portfolios', 'Post Type General Name', 'wcd'),
                'singular_name' => _x('Portfolio', 'Post Type Singular Name', 'wcd'),
                'menu_name' => _x('Portfolios', 'Admin Menu text', 'wcd'),
                'name_admin_bar' => _x('Portfolio', 'Add New on Toolbar', 'wcd'),
                'archives' => __('Portfolio Archives', 'wcd'),
                'attributes' => __('Portfolio Attributes', 'wcd'),
                'parent_item_colon' => __('Parent Portfolio:', 'wcd'),
                'all_items' => __('All Portfolios', 'wcd'),
                'add_new_item' => __('Add New Portfolio', 'wcd'),
                'add_new' => __('Add New', 'wcd'),
                'new_item' => __('New Portfolio', 'wcd'),
                'edit_item' => __('Edit Portfolio', 'wcd'),
                'update_item' => __('Update Portfolio', 'wcd'),
                'view_item' => __('View Portfolio', 'wcd'),
                'view_items' => __('View Portfolios', 'wcd'),
                'search_items' => __('Search Portfolio', 'wcd'),
                'not_found' => __('Not found', 'wcd'),
                'not_found_in_trash' => __('Not found in Trash', 'wcd'),
                'featured_image' => __('Portfolio Image', 'wcd'),
                'set_featured_image' => __('Set portfolio image', 'wcd'),
                'remove_featured_image' => __('Remove portfolio image', 'wcd'),
                'use_featured_image' => __('Use as portfolio image', 'wcd'),
                'insert_into_item' => __('Insert into Portfolio', 'wcd'),
                'uploaded_to_this_item' => __('Uploaded to this Portfolio', 'wcd'),
                'items_list' => __('Portfolios list', 'wcd'),
                'items_list_navigation' => __('Portfolios list navigation', 'wcd'),
                'filter_items_list' => __('Filter Portfolios list', 'wcd'),
            );
            $args = array(
                'label' => __('Portfolio', 'wcd'),
                'description' => __('', 'wcd'),
                'labels' => $labels,
                'menu_icon' => 'dashicons-desktop',
                'supports' => array('title', 'excerpt', 'thumbnail'),
                'taxonomies' => array('port_cat'),
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'show_in_admin_bar' => true,
                'show_in_nav_menus' => true,
                'can_export' => true,
                'has_archive' => true,
                'hierarchical' => false,
                'exclude_from_search' => false,
                'show_in_rest' => true,
                'publicly_queryable' => true,
                'capability_type' => 'post',
            );
            register_post_type('portfolio', $args);
            flush_rewrite_rules();
        }

    }
    $theme_cpt = new WCDCustomPosts();
}
