<?php // Template Name: Kurser ?><?php $layout = 'courses layout-2'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<?php $courses = Courses\Courses::get_posts(); ?>

<div id="main">
  <section id="courses" class="list">
    <div class="content-1">
      <header>
				<h1><?php echo the_title(); ?></h1>
			</header>

      <p><?php echo the_field('description'); ?></p>
    </div>

    <div class="content-2">
      <?php foreach( $courses as $course ): ?>
        <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/course.php', get_defined_vars());?>
      <?php endforeach; ?>
    </div>
  </section>

  <div class="content-3">
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/courses-filter.php', get_defined_vars());?>
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/courses-groups.php', get_defined_vars());?>
  </div>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
