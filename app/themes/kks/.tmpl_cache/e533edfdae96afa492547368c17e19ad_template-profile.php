<?php // Template Name: Profil ?>
<?php echo acf_form_head(); ?><?php $layout = 'profile layout-4'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<div id="main">
  <section id="profile">
    <div class="content-1">
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/profilemenu.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/researcher-profile.php', get_defined_vars());?>
    </div>

    <div class="content-2">
      <article class="body">
        <header>
  				<h1 class="hyphenate"><?php echo the_title(); ?></h1>
  			</header>
      </article>

      <?php echo Core\Profile::init()->form(); ?>
    </div>
  </section>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
