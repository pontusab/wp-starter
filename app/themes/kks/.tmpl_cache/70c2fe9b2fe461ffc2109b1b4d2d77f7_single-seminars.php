<?php $seminar_id = Core\Frontend::get_id_by_template('seminars');
  $picture_url = wp_get_attachment_image_src(get_field('picture'), 'calls')[0];
  $speakers = get_field('speakers');
  $programs = get_field('programs');; ?><?php $layout = 'seminar layout-2'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<div id="main">
  <p class="icon back">
    <a href="<?php echo get_permalink($seminar_id); ?>"><?php echo pll__('go_back'); ?> <?php echo get_the_title($seminar_id); ?></a>
  </p>

  <section id="partner">
		<div class="content-1">
      <header>
				<h1 class="hyphenate"><?php echo the_title(); ?></h1>
			</header>

      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-signup.php', get_defined_vars());?>
		</div>

		<div class="content-2 body">
      <?php if($picture_url): ?>
        <img src="<?php echo $picture_url; ?>" alt="<?php echo the_title(); ?>" />
      <?php endif; ?>

			<?php echo apply_filters('the_content', $post->post_content); ?>


      <?php if($programs): ?>
        <section class="program">
          <header>
            <h2><?php echo pll__('programs'); ?></h2>
          </header>

          <div>
            <?php foreach($programs as $program): ?>
              <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/program.php', get_defined_vars());?>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>

      <?php if($speakers): ?>
        <section class="list speakers">
          <header>
            <h2><?php echo pll__('speakers'); ?></h2>
          </header>

          <?php foreach($speakers as $speaker): ?>
            <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/speakers.php', get_defined_vars());?>
          <?php endforeach; ?>
        </section>
      <?php endif; ?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-share.php', get_defined_vars());?>
		</div>

    <div class="content-3">
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-time.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-place.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-related.php', get_defined_vars());?>
    </div>
	</section>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
