<?php $avatar_url = wp_get_attachment_image_src(get_field('avatar', $researcher->ID), 'researchers-small')[0];
  $title = get_field('title', $researcher->ID);
  $first_name = get_post_meta($researcher->ID, '_first_name', true);
  $last_name = get_post_meta($researcher->ID, '_last_name', true);; ?>

<article class="person">
	<a href="<?php echo get_permalink($researcher->ID); ?>">
	  <img src="<?php echo $avatar_url ? $avatar_url : '/img/avatar.svg'; ?>" width="72" height="72" alt="<?php echo get_the_title($researcher->ID); ?>">

		<header>
		  <h2><?php echo $first_name; ?> <strong><?php echo $last_name; ?></strong></h2>
		</header>

    <?php if($title): ?>
		  <p class="title"><?php echo $title; ?></p>
    <?php endif; ?>

    <p class="tags"><?php echo Core\Frontend::topics('researchers', $researcher->ID, false); ?></p>
	</a>
</article>
