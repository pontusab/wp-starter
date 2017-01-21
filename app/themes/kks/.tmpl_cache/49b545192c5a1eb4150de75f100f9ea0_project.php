<?php $start_date = get_field('start_date', $project->ID);
  $end_date = get_field('end_date', $project->ID);
	$description = get_field('description', $project->ID);
	$passed = $end_date < date('Y') ? 'passed' : '';; ?>

<article class="project <?php echo $passed; ?>">
	<a href="<?php echo get_the_permalink($project->ID); ?>">
		<header>
			<h2><?php echo get_the_title($project->ID); ?></h2>
		</header>

		<p class="period"><?php echo $start_date; ?><?php echo $end_date ? '-'. $end_date : ''; ?></p>
    <p class="tags"><?php echo Core\Frontend::topics('projects', $project->ID, false); ?></p>

		<?php if($description): ?>
			<p><?php echo $description; ?></p>
		<?php endif; ?>
	</a>
</article>
