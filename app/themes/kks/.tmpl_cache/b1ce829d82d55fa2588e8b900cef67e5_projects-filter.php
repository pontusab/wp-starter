<?php $date = isset($_GET['date']) ? true : false;
  $topic = isset($_GET['tag']) ? true : false;
  $project_id = Core\Frontend::get_id_by_template('projects');; ?>

<ul class="filter">
  <li <?php echo !$topic && !$date ? 'class="selected"' : ''; ?>>
    <a href="<?php echo get_permalink($project_id); ?>"><span><?php echo pll__('projects_status_on'); ?></span></a>
  </li>
	<li <?php echo !$topic && $date ? 'class="selected"' : ''; ?>>
    <a href="?date=passed"><span><?php echo pll__('projects_status_off'); ?></span></a>
  </li>
</ul>
