<?php $picture_url = wp_get_attachment_image_src(get_field('picture', $seminar->ID), 'calls')[0];
  $description = get_field('description', $seminar->ID);
  $start_date = get_field('start_date', $seminar->ID);; ?>

<article class="seminar">
	<a href="<?php echo get_permalink($seminar->ID); ?>">
    <?php if($picture_url): ?>
      <img src="<?php echo $picture_url; ?>" alt="<?php echo get_the_title($seminar->ID); ?>">
    <?php endif; ?>

    <time datetime="<?php echo date_i18n('Y-m-d', strtotime($start_date)); ?>">
      <span><?php echo date_i18n('j', strtotime($start_date)); ?></span>
      <span><?php echo Core\Frontend::date($start_date); ?></span>
      <span><?php echo date_i18n('Y', strtotime($start_date)); ?></span>
    </time>

		<div>
			<header>
				<h2><?php echo get_the_title($seminar->ID); ?></h2>
			</header>

      <?php if($description): ?>
        <p><?php echo $description; ?></p>
      <?php endif; ?>
		</div>
	</a>
</article>
