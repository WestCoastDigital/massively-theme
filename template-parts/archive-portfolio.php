<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
$date_string = get_field('completed_date');
if( $date_string ) {
    $date = DateTime::createFromFormat('d/m/Y', $date_string);
} else {
    $date = DateTime::createFromFormat('d/m/Y', get_the_date());
}
?>
    <article>
        <header>
            <span class="date"><?php echo $date->format('F, j, Y');; ?></span>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>
        <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>" class="image fit"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>" /></a>
        <?php } ?>
        <?php if (has_excerpt()) {
            echo '<p>' . wp_trim_words(get_the_excerpt(), 25, '...') . '</p>';
        } else {
            echo '<p>' . wp_trim_words(get_the_content(), 25, '...') . '</p>';
        }?>
        <ul class="actions special">
            <li><a href="#" class="button"><?php echo __('Full Story', 'wcd'); ?></a></li>
        </ul>
    </article>
<?php endwhile; endif; ?>