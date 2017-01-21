<?php $fields = get_fields($coworker->ID);
  $avatar_url = wp_get_attachment_image_src($fields['avatar'], 'researchers-small')[0];; ?>

<?php if($fields): ?>
  <article class="person">
    <img width="72" height="72" src="<?php echo $avatar_url ? $avatar_url : '/img/avatar.svg'; ?>" alt="<?php echo $fields['user']['display_name']; ?>">

    <header>
      <h2><?php echo $fields['user']['display_name']; ?></h2>
    </header>

    <?php if($fields['title']): ?>
      <p class="title"><?php echo $fields['title']; ?></p>
    <?php endif; ?>

    <p class="tel">
      <?php echo Researchers\Researchers::get_phones($coworker->ID, false); ?>
    </p>

    <p class="email"><a href="mailto:<?php echo antispambot($fields['user']['user_email']); ?>"><?php echo $fields['user']['user_email']; ?></a></p>
  </article>
<?php endif; ?>
