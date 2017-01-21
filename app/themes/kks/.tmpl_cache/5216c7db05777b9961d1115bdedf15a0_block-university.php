<?php $universities = wp_get_post_terms($post->ID, 'researchers-university'); ?>

<?php if($universities): ?>
  <section class="block university">
  	<header>
  		<h1><?php echo pll__('university'); ?></h1>
  	</header>

    <?php foreach($universities as $university): ?>
      <p><?php echo $university->name; ?></p>
    <?php endforeach; ?>
  </section>
<?php endif; ?>
