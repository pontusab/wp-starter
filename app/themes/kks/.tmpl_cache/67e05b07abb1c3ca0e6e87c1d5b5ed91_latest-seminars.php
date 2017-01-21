<?php $seminar_id = Core\Frontend::get_id_by_template('seminars');
  $seminars = Seminars\Seminars::get_posts(9);; ?>

<section id="seminars" class="list block">
  <header>
    <h1><?php echo pll__('seminairs'); ?></h1>
  </header>

  <?php foreach($seminars as $seminar): ?>
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/seminar.php', get_defined_vars());?>
  <?php endforeach; ?>

  <p class="more">
    <a href="<?php echo get_permalink($seminar_id); ?>"><?php echo pll__('more_seminairs'); ?></a>
  </p>
</section>
