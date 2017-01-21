<?php $project_id = Core\Frontend::get_id_by_template('projects');
  $slides = get_field('projects');; ?>

<div id="display">
  <div>
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/about.php', get_defined_vars());?>

    <section id="projects">
      <?php if($slides): ?>
        <div class="slider">
          <ul class="slides">
            <?php foreach($slides as $slide): ?>
              <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/slide.php', get_defined_vars());?>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <p class="more">
        <a href="<?php echo get_permalink($project_id); ?>"><?php echo pll__('more_projects'); ?></a>
      </p>
    </section>
  </div>
</div>
