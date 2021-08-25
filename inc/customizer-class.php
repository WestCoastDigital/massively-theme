<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('WcdThemeCustomizer')) {
    class WcdThemeCustomizer
    {
        private $theme_customizer_settings;

        public function __construct()
        {
            add_action('customize_register', array($this, 'panels'));
            add_action('customize_register', array($this, 'sections'));
            add_action('customize_register', array($this, 'controls'));
        }

        public function panels($wp_customize)
        {
            $wp_customize->add_panel('contact', array(
                'title' => __('Contact Info', 'wcd')
            ));
            $wp_customize->add_panel('home', array(
                'title' => __('Home', 'wcd')
            ));
        }

        public function sections($wp_customize)
        {
            $wp_customize->add_section('social' , array(
                'title' => __('Social Profiles', 'wcd'),
                'panel' => 'contact',
            ));
            $wp_customize->add_section('contact_details' , array(
                'title' => __('Contact Details', 'wcd'),
                'panel' => 'contact',
                'priority' => 5
            ));
            $wp_customize->add_section('copyright' , array(
                'title' => __('Copyright', 'wcd'),
                'panel' => 'contact',
                'priority' => 5
            ));
            $wp_customize->add_section('form' , array(
                'title' => __('Contact Form', 'wcd'),
                'panel' => 'contact',
                'priority' => 5
            ));
            $wp_customize->add_section('blog' , array(
                'title' => __('Blog Page Settings', 'wcd'),
                'panel' => 'home',
                'priority' => 5
            ));
        }

        public function controls($wp_customize)
        {
            // Facebook URL
            $wp_customize->add_setting( 'facebook',
                array(
                    'transport' => 'refresh'
                )
            );
 
            $wp_customize->add_control( 'facebook',
                array(
                    'label' => __('Facebook URL', 'wcd'),
                    'section' => 'social',
                    'priority' => 10,
                    'type' => 'url'
                )
            );
            // Twitter URL
            $wp_customize->add_setting( 'twitter',
                array(
                    'transport' => 'refresh'
                )
            );
 
            $wp_customize->add_control( 'twitter',
                array(
                    'label' => __('Twitter URL', 'wcd'),
                    'section' => 'social',
                    'priority' => 10,
                    'type' => 'url'
                )
            );
            // Instagram URL
            $wp_customize->add_setting( 'instagram',
                array(
                    'transport' => 'refresh'
                )
            );
 
            $wp_customize->add_control( 'instagram',
                array(
                    'label' => __('Instagram URL', 'wcd'),
                    'section' => 'social',
                    'priority' => 10,
                    'type' => 'url'
                )
            );
            // LinkedIn URL
            $wp_customize->add_setting( 'linkedin',
                array(
                    'transport' => 'refresh'
                )
            );
 
            $wp_customize->add_control( 'linkedin',
                array(
                    'label' => __('LinkedIn URL', 'wcd'),
                    'section' => 'social',
                    'priority' => 10,
                    'type' => 'url'
                )
            );
            // GitHub URL
            $wp_customize->add_setting( 'github',
                array(
                    'transport' => 'refresh'
                )
            );
 
            $wp_customize->add_control( 'github',
                array(
                    'label' => __('GitHub URL', 'wcd'),
                    'section' => 'social',
                    'priority' => 10,
                    'type' => 'url'
                )
            );
            // Pinterest URL
            $wp_customize->add_setting( 'pinterest',
                array(
                    'transport' => 'refresh'
                )
            );
 
            $wp_customize->add_control( 'pinterest',
                array(
                    'label' => __('Pinterest URL', 'wcd'),
                    'section' => 'social',
                    'priority' => 10,
                    'type' => 'url'
                )
            );
            // Phone
            $wp_customize->add_setting( 'phone',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'phone',
                array(
                    'label' => __('Phone Number', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Country Code
            $wp_customize->add_setting( 'code',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'code',
                array(
                    'label' => __('Country Code', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Email
            $wp_customize->add_setting( 'email',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'email',
                array(
                    'label' => __('Email', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'email'
                )
            );
            // Address
            $wp_customize->add_setting( 'address',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'address',
                array(
                    'label' => __('Address', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Suburb
            $wp_customize->add_setting( 'suburb',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'suburb',
                array(
                    'label' => __('Suburb', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // State
            $wp_customize->add_setting( 'state',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'state',
                array(
                    'label' => __('State', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Post Code
            $wp_customize->add_setting( 'postcode',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'postcode',
                array(
                    'label' => __('Post Code', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Country
            $wp_customize->add_setting( 'country',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'country',
                array(
                    'label' => __('Country', 'wcd'),
                    'section' => 'contact_details',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Copyright
            $wp_customize->add_setting( 'copyright',
                array(
                    'transport' => 'refresh',
                )
            );
 
            $wp_customize->add_control( 'copyright',
                array(
                    'label' => __('Copyright', 'wcd'),
                    'description' => '<p>{{date}} returns current year</p><p>{{copy}} returns &copy; symbol</p><p>{{name}} returns site name</p><p>{{desc}} returns site description</p>',
                    'section' => 'copyright',
                    'priority' => 10,
                    'type' => 'textarea'
                )
            );
            // Contact Form
            $wp_customize->add_setting( 'contact_form',
                array(
                    'default' => '',
                )
            );
 
            $wp_customize->add_control( 'contact_form',
                array(
                    'label' => __('Contact Form Shortcode', 'wcd'),
                    'section' => 'form',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Blog Heading
            $wp_customize->add_setting( 'blog_heading',
                array(
                    'default' => '',
                )
            );
 
            $wp_customize->add_control( 'blog_heading',
                array(
                    'label' => __('Blog Heading', 'wcd'),
                    'section' => 'static_front_page',
                    'priority' => 10,
                    'type' => 'text'
                )
            );
            // Blog Description
            $wp_customize->add_setting( 'blog_desc',
                array(
                    'default' => '',
                )
            );
 
            $wp_customize->add_control( 'blog_desc',
                array(
                    'label' => __('Blog Tagline', 'wcd'),
                    'section' => 'static_front_page',
                    'priority' => 10,
                    'type' => 'textarea'
                )
            );
            // Blog Background
            $wp_customize->add_setting( 'blog_bg',
                array(
                    'default' => '',
                )
            );
            // $wp_customize->add_setting('music', array(
            //     'type' => 'theme_mod',
            //     'capability' => 'edit_theme_options',
            //     'sanitize_callback' => 'absint'
            // ));
            $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'blog_bg',
                array(
                    'label' => __( 'Background Image', 'wcd' ),
                    'section' => 'static_front_page',
                    'mime_type' => 'image',
                )
            ) );

        }

    }
    $theme_customizer = new WcdThemeCustomizer();
}
