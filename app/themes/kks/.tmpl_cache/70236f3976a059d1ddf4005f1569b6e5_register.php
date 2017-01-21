<?php $register_id = pll_get_post(Core\Frontend::get_id_by_template('template-register')); ?>
<aside class="puff">
	<a href="<?php echo get_permalink($register_id); ?>">
		<header>
			<h1><?php echo pll__('register_promo'); ?>?</h1>
		</header>
		<p class="more">
			<span><?php echo pll__('register_goto'); ?></span>
		</p>
	</a>
</aside>
