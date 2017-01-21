<?php $date = isset($_GET['date']) ? true : false;
  $group = isset($_GET['group']) ? true : false;
  $courses_id = Core\Frontend::get_id_by_template('courses');; ?>

<ul class="filter">
  <li <?php echo !$group && !$date ? 'class="selected"' : ''; ?>>
    <a href="<?php echo get_permalink($courses_id); ?>"><span><?php echo pll__('coming'); ?></span></a>
  </li>
	<li <?php echo !$group && $date ? 'class="selected"' : ''; ?>>
    <a href="?date=passed"><span><?php echo pll__('carried'); ?></span></a>
  </li>
</ul>
