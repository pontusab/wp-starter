<?php $related = get_field('more', $post->ID); ?>

<?php if($related): ?>
	<section class="block related">
		<header>
			<h1><?php echo pll__('read_more'); ?></h1>
		</header>
		<?php echo Core\Frontend::get_related($related); ?>
	</section>
<?php endif; ?>
