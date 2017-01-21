<?php $project_id = Core\Frontend::get_id_by_template('courses');
  $selected = isset($_GET['group']) ? $_GET['group'] : null;
  $groups = get_terms([
    'taxonomy' => 'courses-target',
  ]);; ?>

<?php if($groups): ?>
  <section id="tags" class="block">
    <header>
      <h1><?php echo pll__('target_groups'); ?></h1>
    </header>

    <ul class="filter tag">
      <?php foreach($groups as $topic): ?>
        <?php $class = $topic->slug === $selected ? 'class="selected"' : ''; ?>
        <li <?php echo $class; ?>>
          <a href="<?php echo add_query_arg('group', $topic->slug, get_permalink($project_id)); ?>"><span><?php echo $topic->name; ?></span> (<?php echo $topic->count; ?>)</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>
