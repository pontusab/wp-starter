<?php $programs = wp_get_post_terms($post->ID, 'researchers-programs'); ?>

<?php if($programs): ?>
  <section class="block research-program">
  	<header>
  		<h1><?php echo pll__('research-program'); ?></h1>
  	</header>

    <?php foreach($programs as $program): ?>
  	  <p><?php echo $program->name; ?></p>
    <?php endforeach; ?>
  </section>
<?php endif; ?>
