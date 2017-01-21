<?php $place = get_field('location');
  $map_url = get_field('map_url');; ?>

<?php if($place): ?>
  <section class="block place">
  	<header>
      <h1><?php echo pll__('place'); ?></h1>
    </header>

  	<p><?php echo $place; ?></p>

    <?php if($map_url): ?>
      <p class="icon map">
        <a href="<?php echo $map_url; ?>" rel="external nofollow" target="_blank"><?php echo pll__('map'); ?></a>
      </p>
    <?php endif; ?>
  </section>
<?php endif; ?>
