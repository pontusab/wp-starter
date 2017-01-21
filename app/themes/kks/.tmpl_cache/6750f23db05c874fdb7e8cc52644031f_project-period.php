<?php $start_date = get_field('start_date');
  $end_date = get_field('end_date');; ?>

<?php if($start_date): ?>
  <section class="block period">
  	<header>
  		<h1><?php echo pll__('project_period'); ?></h1>
  	</header>

    <?php if($start_date): ?>
     <p><?php echo $start_date; ?><?php echo $end_date ? '-'. $end_date : ''; ?></p>
    <?php endif; ?>
  </section>
<?php endif; ?>
