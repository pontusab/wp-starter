<?php $start_date = get_field('start_date');
  $end_date = get_field('end_date');
  $start_time = get_field('start_time');
  $end_time = get_field('end_time');
  $start_month = date_i18n('F', strtotime($start_date));
  $end_month = date_i18n('F', strtotime($end_date));; ?>

<?php if($start_date): ?>
  <section class="block time">
  	<header>
      <h1><?php echo pll__('time'); ?></h1>
    </header>

    <?php if($start_date): ?>

      <?php if(!$end_date): ?>
        <time><?php echo date_i18n('j F Y', strtotime($start_date)); ?></time>
      <?php elseif($start_month !== $end_month): ?>
        <time><?php echo date_i18n('j F', strtotime($start_date)); ?> - <?php echo date_i18n('j F', strtotime($end_date)); ?></time>
      <?php else: ?>
        <time><?php echo date_i18n('j', strtotime($start_date)); ?><?php echo '-'. date_i18n('j F Y', strtotime($end_date)); ?></time>
      <?php endif; ?>
    <?php endif; ?>

    <?php if($start_time): ?>
  	 <p class="hours"><?php echo $start_time; ?><?php echo $end_time ? '-'. $end_time : ''; ?></p>
    <?php endif; ?>
  </section>
<?php endif; ?>
