<?php get_header(); ?>

<!-- Main -->
    <div id="main">
        <!-- Post -->
        <section class="post">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="major">
                <?php the_title('<h1>', '</h1>'); ?>
                <?php if(has_excerpt()) { ?>
                    <p><?php the_excerpt(); ?></p>
                <?php } ?>
            </header>
            <?php if(has_post_thumbnail()) { ?>
                <div class="image main">
                    <?php the_post_thumbnail( 'single-post', array( 'itemprop' => 'image' ) ); ?>
                </div>
            <?php } ?>
            <?php the_content(); ?>
            <?php get_template_part('template-parts/post', 'comment'); ?>
            <?php endwhile; endif; ?>
            <?php get_template_part( 'template-parts/post', 'pagination' ); ?>
        </section>
    </div>

<?php get_footer(); ?>