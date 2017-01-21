<?php $programmes = get_field('programmes'); ?>

<?php if($programmes): ?>
  <section class="block programmes">
  	<header>
      <h1><?php echo pll__('calls_title'); ?></h1>
    </header>

    <div>
      <?php foreach($programmes as $program): ?>
        <p>
          <a href="<?php echo get_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
        </p>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>
