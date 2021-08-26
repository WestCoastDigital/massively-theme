<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('WCDCustomTaxonomies')) {
    class WCDCustomTaxonomies
    {
        private $theme_tax_settings;

        public function __construct()
        {
            add_action('init', array($this, 'port_cat'), 0);
            add_action('init', array($this, 'port_tag'), 0);
        }

        public function port_cat()
        {

            $labels = array(
                'name' => _x('Categories', 'taxonomy general name', 'wcd'),
                'singular_name' => _x('Category', 'taxonomy singular name', 'wcd'),
                'search_items' => __('Search Categories', 'wcd'),
                'all_items' => __('All Categories', 'wcd'),
                'parent_item' => __('Parent Category', 'wcd'),
                'parent_item_colon' => __('Parent Category:', 'wcd'),
                'edit_item' => __('Edit Category', 'wcd'),
                'update_item' => __('Update Category', 'wcd'),
                'add_new_item' => __('Add New Category', 'wcd'),
                'new_item_name' => __('New Category Name', 'wcd'),
                'menu_name' => __('Category', 'wcd'),
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
            );
            register_taxonomy('port_cat', array('portfolio'), $args);
            flush_rewrite_rules();
        }

        public function port_tag()
        {

            $labels = array(
                'name' => _x('Tags', 'taxonomy general name', 'wcd'),
                'singular_name' => _x('Tag', 'taxonomy singular name', 'wcd'),
                'search_items' => __('Search Tags', 'wcd'),
                'all_items' => __('All Tags', 'wcd'),
                'parent_item' => __('Parent Tag', 'wcd'),
                'parent_item_colon' => __('Parent Tag:', 'wcd'),
                'edit_item' => __('Edit Tag', 'wcd'),
                'update_item' => __('Update Tag', 'wcd'),
                'add_new_item' => __('Add New Tag', 'wcd'),
                'new_item_name' => __('New Tag Name', 'wcd'),
                'menu_name' => __('Tag', 'wcd'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => true,
                'show_in_rest' => true,
            );
            register_taxonomy('port_tag', array('portfolio'), $args);
            flush_rewrite_rules();
        }

    }
    $theme_tax = new WCDCustomTaxonomies();
}
