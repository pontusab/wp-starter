<?php // Template Name: Om oss ?><?php $layout = 'about layout-3'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<?php $coworkers = Coworkers\Coworkers::get_posts('managment'); ?>

<div id="main">
  <div class="content-1">
    <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/submenu.php', get_defined_vars());?>
  </div>

  <div class="content-2">
    <article class="body">
      <header>
        <h1><?php echo the_title(); ?></h1>
      </header>

      <?php echo apply_filters( 'the_content', $post->post_content ); ?>

      <section class="list">
        <header>
          <h2><?php echo pll__('management_list'); ?></h2>
        </header>

        <?php if($coworkers): ?>
          <?php foreach($coworkers as $coworker): ?>
            <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/person.php', get_defined_vars());?>
          <?php endforeach; ?>
        <?php endif; ?>

      </section>
    </article>
  </div>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
