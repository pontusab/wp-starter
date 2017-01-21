<?php $closing_date = get_field('closing');
  $closing_time = get_field('closing_time');; ?>

<?php if($closing_date): ?>
  <section class="block period">
  	<header>
  		<h1><?php echo pll__('closing_title'); ?></h1>
  	</header>
  	<p><?php echo $closing_date; ?> <?php echo $closing_time; ?></p>
  </section>
<?php endif; ?>
