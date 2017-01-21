		<?php $cookies_id = Core\Frontend::get_id_by_template('template-cookies'); ?>
		<footer>
			<div>
				<p class="copyright"><?php echo get_bloginfo('name'); ?> © 2002–<?php echo date('Y'); ?></p>
				<p class="secondary"><a href="<?php echo get_permalink($cookies_id); ?>"><?php echo pll__('cookies'); ?></a></p>
			</div>
		</footer>
		<?php echo wp_footer(); ?>
	</body>
</html>
