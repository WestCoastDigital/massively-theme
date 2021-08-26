<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$theme_dir = get_template_directory();
require $theme_dir . '/inc/theme-setup-class.php';
require $theme_dir . '/inc/customizer-class.php';
require $theme_dir . '/inc/cpt-class.php';
require $theme_dir . '/inc/tax-class.php';

function wcd_social_links($true = '')
{
    $alt = $true;
    $content = '';
    $socialArray = array(
        'facebook' => get_theme_mod('facebook') ? get_theme_mod('facebook') : '',
        'twitter' => get_theme_mod('twitter') ? get_theme_mod('twitter') : '',
        'instagram' => get_theme_mod('instagram') ? get_theme_mod('instagram') : '',
        'linkedin' => get_theme_mod('linkedin') ? get_theme_mod('linkedin') : '',
        'github' => get_theme_mod('github') ? get_theme_mod('github') : '',
        'pinterest' => get_theme_mod('pinterest') ? get_theme_mod('pinterest') : '',
    );
    $content .= '<ul class="icons ' . $alt . '">';
    foreach($socialArray as $key => $value) {
        if(!empty($value)) {
            $content .= '<li><a href="' . $value . '" class="icon ' . $alt . ' brands fa-' . $key . '" aria-label="' . ucwords($key) . ' Link"><span class="label">' . ucwords($key) . '</span></a></li>';
        }
    }
    $content .= '</ul>';


    return $content;
}

function wcd_address()
{
    $address = get_theme_mod('address');
    $suburb = get_theme_mod('suburb');
    $state = get_theme_mod('state');
    $postcode = get_theme_mod('postcode');
    $country = get_theme_mod('country');
    $full = $address . ' ' . $suburb . ' ' . $state . ' ' . $country . ' ' . $postcode;
    $google = 'https://www.google.com/maps/place/' . urlencode($full);
    $content = '';

    if( $address ) {
        $content .= '<a href="' . $google . '" style="text-decoration: none; border-bottom: none;">';
            $content .= $address;
            if( $suburb ) {
                $content .= '<br />';
                $content .= $suburb;
            }
            if( $state ) {
                $content .= '<br />';
                $content .= $state;
            }
            if( $country ) {
                $content .= ', ' . $country;
            }
            if( $postcode ) {
                $content .= ', ' . $postcode;
            }
        $content .= '</a>';
    }

    return $content;
}

function wcd_phone()
{
    $phone = get_theme_mod('phone');
    $code = get_theme_mod('code');
    $content = '';
    
    if( $phone ) {
        $phone_strip = str_replace(' ', '', $phone);
        $phone_strip = preg_replace('/[^0-9.]/', '', $phone_strip);
        $phone_strip = ltrim($phone_strip, '0');
        $phone_url = 'tel:' . $code . $phone_strip;
        $content .= '<a href="' . $phone_url . '">';
        $content .= $phone;
        $content .= '</a>';
    }
    return $content;
}

function wcd_email()
{
    $email = get_theme_mod('email');
    if( $email ) {
        return '<a href="mailto:' . $email . '">' . $email . '</a>';
    }
}

function wcd_copyright()
{
    $copyright = get_theme_mod('copyright');
    $date = date('Y');
    $name = get_bloginfo('name');
    $desc = get_bloginfo('description');
    $tag = 'Design <a href="https://html5up.net">HTML5 UP</a>';
    $content = '<ul>';
    if( $copyright ) {
        $copyright = str_replace('{{date}}', $date, $copyright);
        $copyright = str_replace('{{copy}}', '&copy;', $copyright);
        $copyright = str_replace('{{name}}', $name, $copyright);
        $copyright = str_replace('{{desc}}', $desc, $copyright);
        $content .= '<li>' . $copyright . '</li>';
    } else {
        $content .= '<li>&copy;' . $date . ' ' . $name . '.</li><li>' . $tag . '</li>';
    }
    $content .= '</ul>';

    return $content;
}

function wcd_form()
{
    $form = get_theme_mod('contact_form');
    if( $form ) {
        return do_shortcode($form);
    }
}

function wcd_portfolio_taxonomy($tax = 'port_cat' )
{
    if ( ! $post = get_post() ) {
        return '';
    }

    $taxonomy = $tax;
    $terms = get_the_terms($post->ID, $taxonomy);
    $content = '<ul class="terms ' . $tax . '">';
    foreach ( $terms as $term ) {
        $term_link = get_term_link( $term );
        $content .= '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
    }
    $content .= '</ul>';
    return $content;
}