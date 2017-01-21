<?php $project_id = Core\Frontend::get_id_by_template('projects');
  $selected = isset($_GET['tag']) ? $_GET['tag'] : null;
  $topics = get_terms([
    'taxonomy' => 'global-topics',
    'post_type' => 'projects',
  ]);; ?>

<?php if($topics): ?>
  <section id="tags" class="block">
    <header>
      <h1><?php echo pll__('topics'); ?></h1>
    </header>

    <ul class="filter tag">
      <?php foreach($topics as $topic): ?>
        <?php $class = $topic->slug === $selected ? 'class="selected"' : ''; ?>
        <li <?php echo $class; ?>>
          <a href="<?php echo add_query_arg('tag', $topic->slug, get_permalink($project_id)); ?>"><span><?php echo $topic->name; ?></span> (<?php echo $topic->count; ?>)</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php endif; ?>
