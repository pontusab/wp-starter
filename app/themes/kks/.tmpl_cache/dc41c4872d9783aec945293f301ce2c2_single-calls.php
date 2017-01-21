<?php $calls_id = Core\Frontend::get_id_by_template('calls');
  $picture_url = wp_get_attachment_image_src(get_field('picture'), 'calls')[0];; ?><?php $layout = 'call layout-2'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>

<div id="main">
  <p class="icon back">
    <a href="<?php echo get_permalink($calls_id); ?>"><?php echo pll__('go_back'); ?> <?php echo get_the_title($calls_id); ?></a>
  </p>

  <section id="partner">
		<div class="content-1">
			<header>
				<h1 class="hyphenate"><?php echo the_title(); ?></h1>
			</header>
		</div>

		<div class="content-2 body">

      <?php if($picture_url): ?>
        <img src="<?php echo $picture_url; ?>" alt="<?php echo the_title(); ?>" />
      <?php endif; ?>

			<?php echo apply_filters( 'the_content', $post->post_content ); ?>

      <?php echo Core\Frontend::topics('calls', $post->ID); ?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-share.php', get_defined_vars());?>
		</div>

    <div class="content-3">
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-period.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-related.php', get_defined_vars());?>
    </div>
	</section>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
