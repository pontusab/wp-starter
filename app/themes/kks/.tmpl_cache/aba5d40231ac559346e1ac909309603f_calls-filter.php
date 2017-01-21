<?php $date = isset($_GET['date']) ? true : false;
  $topic = isset($_GET['tag']) ? true : false;
  $call_id = Core\Frontend::get_id_by_template('calls');; ?>

<ul class="filter">
  <li <?php echo !$topic && !$date ? 'class="selected"' : ''; ?>>
    <a href="<?php echo get_permalink($call_id); ?>"><span><?php echo pll__('open'); ?></span></a>
  </li>
	<li <?php echo !$topic && $date ? 'class="selected"' : ''; ?>>
    <a href="?date=passed"><span><?php echo pll__('passed'); ?></span></a>
  </li>
</ul>
