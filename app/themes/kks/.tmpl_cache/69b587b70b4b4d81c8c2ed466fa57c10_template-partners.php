<?php // Template Name: Partner ?><?php $layout = 'partners layout-4'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<?php $partners = get_posts([
  'post_type' => 'programmes',
  'posts_per_page' => -1
]); ?>

<div id="main">
  <section id="partners">
    <div class="content-1">
      <header>
				<h1><?php echo the_title(); ?></h1>
			</header>

      <p><?php echo get_field('description'); ?></p>
    </div>

    <div class="content-2">
      <?php foreach($partners as $partner): ?>
        <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/partner.php', get_defined_vars());?>
      <?php endforeach; ?>
    </div>
  </section>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
