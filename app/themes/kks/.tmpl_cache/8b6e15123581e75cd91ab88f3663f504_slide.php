<?php $picture_url = wp_get_attachment_image_src(get_field('picture_display', $slide->ID), 'projects-large')[0];
  $description = get_field('description', $slide->ID);; ?>

<?php if($picture_url): ?>
  <li>
    <a href="<?php echo get_permalink($slide->ID); ?>">
      <img src="<?php echo $picture_url; ?>" alt="<?php echo get_the_title($slide->ID); ?>" />

      <div>
        <h2><?php echo get_the_title($slide->ID); ?></h2>

        <?php if($description): ?>
          <p><?php echo $description; ?></p>
        <?php endif; ?>
        <p class="more"><span><?php echo pll__('read_more'); ?></span></p>
      </div>
    </a>
  </li>
<?php endif; ?>
