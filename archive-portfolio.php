<?php get_header(); ?>

<!-- Main -->
    <div id="main">
        <section class="posts">
            <?php get_template_part( 'template-parts/archive', 'portfolio' ); ?>
        </section>
        <?php get_template_part('template-parts/blog', 'pagination'); ?>
    </div>

<?php get_footer(); ?>