<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    if( is_sticky() ) { ?>
        <article class="post featured">
            <header class="major">
                <span class="date"><?php the_date('F, j, Y'); ?></span>
                <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title($id); ?></a></h2>
                <?php if (has_excerpt()) {
                    echo '<p>' . wp_trim_words(get_the_excerpt(), 25, '...') . '</p>';
                } else {
                    echo '<p>' . wp_trim_words(get_the_content(), 25, '...') . '</p>';
                }?>
            </header>
            <?php if( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>" class="image main"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>" /></a>
            <?php } ?>
            <ul class="actions special">
                <li><a href="<?php the_permalink(); ?>" class="button large"><?php echo __('Full Story', 'wcd'); ?></a></li>
            </ul>
        </article>
    <?php }
endwhile; endif;