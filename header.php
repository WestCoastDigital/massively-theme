<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <?php wp_head(); ?>
    </head>
	<body <?php body_class('is-preload'); ?>>
	<?php wp_body_open(); ?>

		<!-- Wrapper -->
			<?php
			if( is_home() ) {
				$img_id = get_theme_mod('blog_bg');
				if($img_id) {
					$img = wp_get_attachment_url($img_id, 'full');
				}
			} elseif( has_post_thumbnail() ) {
				$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
			}
			?>
			<div id="wrapper" class="fade-in" data-bg="<?php echo $img; ?>">

		<!-- Intro -->
			<div id="intro">
				<?php if (is_home() || is_front_page() ) {
					$heading = get_theme_mod('blog_heading');
					$desc = get_theme_mod('blog_desc');
					if($heading) {
						echo '<h1>' . $heading . '</h1>';
					}
					if($desc) {
					 echo '<p>' . $desc . '</p>';
					}
				} elseif (is_singular('portfolio')) {
					echo '<h1>' . get_the_title() . '</h1>';
					if( has_excerpt()) {
						echo '<p>' . get_the_excerpt() . '</p>';
					}
				}?>
				<ul class="actions">
					<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
				</ul>
			</div>

		<!-- Header -->
			<header id="header">
				<a href="<?php echo home_url( '/' ); ?>" class="logo"><?php echo get_bloginfo('name'); ?></a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<?php wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'menu_class' => 'menu links',
					'link_before' => '<span itemprop="name">',
					'link_after' => '</span>',
					'container' => false,
					'fallback_cb' => false
				)); ?>
				<?php echo wcd_social_links(); ?>
			</nav>