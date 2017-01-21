<?php $picture_url = wp_get_attachment_image_src(get_field('picture', $article->ID), 'calls')[0];
  $description = get_field('description', $article->ID);; ?>

<article class="news">
  <a href="<?php echo get_permalink($article->ID); ?>">

    <?php if($picture_url): ?>
      <img src="<?php echo $picture_url; ?>" alt="<?php echo get_the_title($article->ID); ?>">
    <?php endif; ?>

    <time datetime="<?php echo date_i18n('Y-m-d', strtotime($article->post_date)); ?>">
      <span><?php echo date_i18n('j', strtotime($article->post_date)); ?></span>
      <span><?php echo date_i18n('F', strtotime($article->post_date)); ?></span>
      <span><?php echo date_i18n('Y', strtotime($article->post_date)); ?></span>
    </time>

    <?php echo Core\Frontend::categories($article->ID, false); ?>

    <div>
      <header>
        <h2><?php echo get_the_title($article->ID); ?></h2>
      </header>

      <?php if($description): ?>
        <p><?php echo $description; ?></p>
      <?php endif; ?>

    </div>
  </a>
</article>
