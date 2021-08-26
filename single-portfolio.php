<?php get_header(); ?>

<!-- Main -->
    <div id="main">
        <!-- Post -->
        <section class="post">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="major">
                <?php the_title('<h1>', '</h1>'); ?>
            </header>
            <?php get_template_part('template-parts/portfolio', 'single'); ?>
            <?php get_template_part('template-parts/post', 'comment'); ?>
            <?php endwhile; endif; ?>
            <?php get_template_part( 'template-parts/post', 'pagination' ); ?>
        </section>
    </div>

<?php get_footer(); ?>