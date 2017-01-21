<?php $budget = get_field('budget'); ?>

<?php if($budget): ?>
  <section class="block budget">
  	<header>
  		<h1><?php echo pll__('budget'); ?></h1>
  	</header>
  	<p><?php echo $budget; ?></p>
  </section>
<?php endif; ?>
