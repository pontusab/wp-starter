<?php $logo_url = wp_get_attachment_image_src(get_field('logo', $partner->ID), 'programmes')[0];; ?>
<article class="type-<?php echo mt_rand(2, 7) * 10; ?>">
  <a href="<?php echo get_permalink($partner->ID); ?>">
    <div class="logo">
      <img src="<?php echo $logo_url; ?>" alt="<?php echo get_the_title($partner->ID); ?>" />
    </div>
    <header>
      <h2><?php echo get_the_title($partner->ID); ?></h2>
    </header>

    <p class="more">
      <span><?php echo pll__('read_more'); ?></span>
    </p>
  </a>
</article>
