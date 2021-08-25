<?php get_header(); ?>

<!-- Main -->
    <div id="main">
        <?php get_template_part('template-parts/featured', 'post'); ?>
        <section class="posts">
            <?php get_template_part( 'template-parts/blog', 'post' ); ?>
        </section>
        <?php get_template_part('template-parts/blog', 'pagination'); ?>
    </div>

<?php get_footer(); ?>