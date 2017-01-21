<?php // Template Name: Forskare ?><?php $layout = 'researchers layout-2'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<?php $researchers = Researchers\Researchers::get_posts(); ?>

<div id="main">
  <section id="researchers" class="list">
    <div class="content-1">
      <header>
				<h1><?php echo the_title(); ?></h1>
			</header>

      <p><?php echo the_field('description'); ?></p>

      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/register.php', get_defined_vars());?>
    </div>

    <div class="content-2" id="content-primary">
      <?php echo Researchers\Researchers::init()->letters_filter(); ?>

      <?php foreach($researchers as $researcher): ?>
        <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/researcher.php', get_defined_vars());?>
      <?php endforeach; ?>
    </div>
  </section>

  <div class="content-3">
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/researchers-tags.php', get_defined_vars());?>
  </div>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
