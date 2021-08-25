<?php
/**
 * Create post loop query
 */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'ignore_sticky_posts' => true,
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'showposts' => 6,
    'no_rows_found' => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'paged' => $paged,
);
$custom_loop = new WP_Query($args);

echo '<section class="posts">';
while ($custom_loop->have_posts()): $custom_loop->the_post();
    get_template_part('template-parts/blog', 'post');
endwhile;
echo '</section>';
if ($custom_loop->max_num_pages > 1) {
    get_template_part('template-parts/blog', 'pagination');
}
wp_reset_postdata();