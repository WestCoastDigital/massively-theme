<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('WcdThemeSetup')) {
    class WcdThemeSetup
    {
        private $theme_settings;

        public function __construct()
        {
            add_action('after_setup_theme', array($this, 'setup'));
            add_action('wp_enqueue_scripts', array($this, 'enqueue'));
            add_filter('document_title_separator', array($this, 'document_title_separator'));
            add_filter('the_title', array($this, 'title'));
            add_filter('nav_menu_link_attributes', array($this, 'schema_url'), 10);
            add_action('wp_body_open', array($this, 'skip_link'), 5);
            add_filter('the_content_more_link', array($this, 'read_more_link'));
            add_filter('excerpt_more', array($this, 'excerpt_read_more_link'));
            add_action('wp_head', array($this, 'pingback_header'));
            add_action('comment_form_before', array($this, 'enqueue_comment_reply_script'));
            add_filter('get_comments_number', array($this, 'comment_count'), 0);
            add_action('wp_head', array($this, 'head_noscript'));
            add_filter('nav_menu_css_class' , array($this, 'nav_class'), 10 , 2);
            add_action( 'after_setup_theme', array($this, 'images'));
            add_filter('next_posts_link_attributes', array($this, 'next_post_att'));
            add_filter('previous_posts_link_attributes', array($this, 'prev_post_att'));
        }

        public function setup()
        {
            load_theme_textdomain('wcd', get_template_directory() . '/languages');
            add_theme_support('title-tag');
            add_theme_support('post-thumbnails');
            add_theme_support('responsive-embeds');
            add_theme_support('automatic-feed-links');
            add_theme_support('html5', array('search-form'));
            add_post_type_support( 'page', 'excerpt' );
            global $content_width;
            if (!isset($content_width)) {$content_width = 1920;}
            register_nav_menus(
                array(
                    'main-menu' => esc_html__('Main Menu', 'wcd')
                )
            );
        }

        public function enqueue()
        {
            wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/main.css' );
            wp_enqueue_style('custom-style', get_stylesheet_uri());
            wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.4.1', true );
			wp_enqueue_script('scrollex', get_template_directory_uri() . '/assets/js/jquery.scrollex.min.js', array(), '0.2.1', true );
			wp_enqueue_script('scrolly', get_template_directory_uri() . '/assets/js/jquery.scrolly.min.js', array(), '1.0.0', true );
			wp_enqueue_script('browser', get_template_directory_uri() . '/assets/js/browser.min.js', array(), '1.0.0', true );
			wp_enqueue_script('breakpoints', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array(), '1.0.0', true );
			wp_enqueue_script('util', get_template_directory_uri() . '/assets/js/util.js', array(), '1.0.0', true );
			wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
        }

        public function document_title_separator($sep)
        {
            $sep = '|';
            return $sep;
        }

        public function title($title)
        {
            if ($title == '') {
                return '...';
            } else {
                return $title;
            }
        }

        public function schema_url($atts)
        {
            $atts['itemprop'] = 'url';
            return $atts;
        }

        public function wp_body_open()
        {
            do_action('wp_body_open');
        }

        public function skip_link()
        {
            echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'wcd') . '</a>';
        }

        public function read_more_link()
        {
            if (!is_admin()) {
                return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'wcd'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
            }
        }

        public function excerpt_read_more_link($more)
        {
            if (!is_admin()) {
                global $post;
                return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'wcd'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
            }
        }

        public function pingback_header()
        {
            if (is_singular() && pings_open()) {
                printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
            }
        }

        public function enqueue_comment_reply_script()
        {
            if (get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }

        public function custom_pings($comment)
        {
            ?><li <?php comment_class();?> id="li-comment-<?php comment_ID();?>"><?php echo esc_url(comment_author_link()); ?></li><?php
}

        public function comment_count($count)
        {
            if (!is_admin()) {
                global $id;
                $get_comments = get_comments('status=approve&post_id=' . $id);
                $comments_by_type = separate_comments($get_comments);
                return count($comments_by_type['comment']);
            } else {
                return $count;
            }
        }

        public function head_noscript()
        {
            echo '<noscript><link rel="stylesheet" href="' . get_template_directory_uri(). '/assets/css/noscript.css" /></noscript>';
        }

        public function nav_class($classes, $item)
        {
            if (in_array('current-menu-item', $classes) ){
              $classes[] = 'active ';
            }
            return $classes;
        }

        public function images() {
            add_image_size( 'featured-thumb', 1195, 582, true );
            add_image_size( 'post-thumb', 597, 365, true );
            add_image_size( 'single-post', 896, 436, true );
        }

        public function next_post_att() {
            return 'class="next"';
        }

        public function prev_post_att() {
            return 'class="previous"';
        }

        public function pagination() {
 
            if( is_singular() )
                return;
         
            global $wp_query;
         
            /** Stop execution if there's only 1 page */
            if( $wp_query->max_num_pages <= 1 )
                return;
         
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
            $max   = intval( $wp_query->max_num_pages );
         
            /** Add current page to the array */
            if ( $paged >= 1 )
                $links[] = $paged;
         
            /** Add the pages around the current page to the array */
            if ( $paged >= 3 ) {
                $links[] = $paged - 1;
                $links[] = $paged - 2;
            }
         
            if ( ( $paged + 2 ) <= $max ) {
                $links[] = $paged + 2;
                $links[] = $paged + 1;
            }
         
            echo '<div class="pagination"><ul>' . "\n";
         
            /** Previous Post Link */
            if ( get_previous_posts_link() )
                printf( '<li>%s</li>' . "\n", get_previous_posts_link('Prev') );
         
            /** Link to first page, plus ellipses if necessary */
            if ( ! in_array( 1, $links ) ) {
                $class = 1 == $paged ? ' class="active"' : '';
         
                printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
         
                if ( ! in_array( 2, $links ) )
                    echo '<li>…</li>';
            }
         
            /** Link to current page, plus 2 pages in either direction if necessary */
            sort( $links );
            foreach ( (array) $links as $link ) {
                $class = $paged == $link ? ' class="active"' : '';
                printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
            }
         
            /** Link to last page, plus ellipses if necessary */
            if ( ! in_array( $max, $links ) ) {
                if ( ! in_array( $max - 1, $links ) )
                    echo '<li>…</li>' . "\n";
         
                $class = $paged == $max ? ' class="active"' : '';
                printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
            }
         
            /** Next Post Link */
            if ( get_next_posts_link() )
                printf( '<li>%s</li>' . "\n", get_next_posts_link('Next') );
         
            echo '</ul></div>' . "\n";
         
        }        

    }
    $theme_setup = new WcdThemeSetup();
}
