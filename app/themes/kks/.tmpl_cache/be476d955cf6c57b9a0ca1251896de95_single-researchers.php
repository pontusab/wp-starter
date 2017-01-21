<?php $researcher_id = Core\Frontend::get_id_by_template('researchers');
  $avatar_url = wp_get_attachment_image_src(get_field('avatar'), 'researchers')[0];
  $title = get_field('title');
  $research = get_field('research');
  $projects = Researchers\Relations::init()->get_result($post->ID, true, true);
  $content = get_field('content');; ?><?php $layout = 'researcher layout-2'; ?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/doctype.php', get_defined_vars());?>
<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/head.php', get_defined_vars());?>


<div id="main">
  <p class="icon back">
    <a href="<?php echo get_permalink($researcher_id); ?>"><?php echo pll__('go_back'); ?> <?php echo get_the_title($researcher_id); ?></a>
  </p>

  <section id="researcher">
		<div class="content-1">
      <img src="<?php echo $avatar_url ? $avatar_url : '/img/avatar.svg'; ?>" alt="<?php echo the_title(); ?>">

			<header>
				<h1><?php echo the_title(); ?></h1>
			</header>

      <?php if($title): ?>
        <p class="title"><?php echo $title; ?></p>
      <?php endif; ?>
		</div>

		<div class="content-2 body">
			<?php echo $content; ?>

      <?php if($research): ?>
        <h2><?php echo pll__('research'); ?></h2>
        <?php echo $research; ?>
      <?php endif; ?>

      <?php if($projects): ?>
        <section class="list projects">
        	<header>
        		<h2><?php echo pll__('projects'); ?></h2>
        	</header>

          <?php foreach($projects as $project): ?>
            <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/project.php', get_defined_vars());?>
          <?php endforeach; ?>
        </section>
      <?php endif; ?>

      <?php echo Core\Frontend::topics('researchers', $post->ID); ?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-share.php', get_defined_vars());?>
		</div>

    <div class="content-3">
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-contact.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-research-program.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-university.php', get_defined_vars());?>
      <?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/block-related.php', get_defined_vars());?>
    </div>
	</section>
</div>

<?php Blade\Blade::insert('/Users/pontus/Sites/kunskapsformedlingen/app/themes/kunskapsformedlingen/modules/footer.php', get_defined_vars());?>
