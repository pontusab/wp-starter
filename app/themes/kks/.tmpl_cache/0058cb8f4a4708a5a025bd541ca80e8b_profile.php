<?php $user = get_field('profile');
  $research_id = Core\Frontend::get_id_by_template('researchers');; ?>

<?php if($user): ?>
  <?php $description = get_field('description', $user->ID);
    $title = get_field('title', $user->ID);
    $avatar_url = wp_get_attachment_image_src(get_field('avatar', $user->ID), 'researchers-small')[0];; ?>

  <section id="profile" class="list block">
    <header>
      <h1><?php echo pll__('current_profile'); ?></h1>
    </header>

    <article class="person display">
      <a href="<?php echo get_permalink($user->ID); ?>">
        <img src="<?php echo $avatar_url ? $avatar_url : '/img/avatar.svg'; ?>" width="72" height="72" alt="<?php echo $user->post_title; ?>">

        <header>
          <h2><?php echo $user->post_title; ?></h2>
        </header>

        <?php if($title): ?>
          <p class="title"><?php echo $title; ?></p>
        <?php endif; ?>

        <?php if($description): ?>
          <p class="description hyphenate"><?php echo $description; ?></p>
        <?php endif; ?>
      </a>
    </article>

    <p class="more">
      <a href="<?php echo get_permalink($research_id); ?>"><?php echo pll__('more_researchers'); ?></a>
    </p>
  </section>
<?php endif; ?>
