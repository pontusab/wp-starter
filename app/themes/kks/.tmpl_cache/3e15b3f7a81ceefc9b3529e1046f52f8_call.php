<?php $closing = get_field('closing', $call->ID);
	$description = get_field('description', $call->ID);
	$date = date('Y-m-d');
	$passed = $closing <= $date && $closing != '' ? 'passed' : '';; ?>

<article class="call <?php echo $passed; ?>">
	<a href="<?php echo get_the_permalink($call->ID); ?>">
		<header>
			<h2><?php echo get_the_title($call->ID); ?></h2>
		</header>

		<p class="closes"><?php echo $closing; ?></p>

		<?php if($description): ?>
			<p class="tags"><?php echo $description; ?></p>
		<?php else: ?>
			<?php echo Core\Frontend::topics('calls', $call->ID, false); ?>
		<?php endif; ?>
	</a>
</article>
