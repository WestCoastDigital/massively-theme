				<!-- Footer -->
                <footer id="footer">
						<section>
							<?php echo wcd_form(); ?>
						</section>
						<section class="split contact">
							<section class="alt">
								<h3><?php echo __('Address', 'wcd'); ?></h3>
								<p><?php echo wcd_address(); ?></p>
							</section>
							<section>
								<h3><?php echo __('Phone', 'wcd'); ?></h3>
								<p><?php echo wcd_phone(); ?></p>
							</section>
							<section>
								<h3><?php echo __('Email', 'wcd'); ?></h3>
								<p><?php echo wcd_email(); ?></p>
							</section>
							<section>
								<h3><?php echo __('Social', 'wcd'); ?></h3>
								<?php echo wcd_social_links('alt'); ?>
							</section>
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<?php echo wcd_copyright(); ?>
					</div>

			</div>

    <?php wp_footer(); ?>
	</body>
</html>