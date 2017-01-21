<?php $date = isset($_GET['date']) ? true : false;
  $seminairs_id = Core\Frontend::get_id_by_template('seminairs');; ?>

<ul class="filter">
  <li <?php echo !$date ? 'class="selected"' : ''; ?>>
    <a href="<?php echo get_permalink($seminairs_id); ?>"><span><?php echo pll__('coming'); ?></span></a>
  </li>
	<li <?php echo $date ? 'class="selected"' : ''; ?>>
    <a href="?date=passed"><span><?php echo pll__('carried'); ?></span></a>
  </li>
</ul>
