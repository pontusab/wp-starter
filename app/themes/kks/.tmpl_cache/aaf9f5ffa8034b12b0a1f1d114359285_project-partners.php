<?php $partners = get_field('partners'); ?>

<?php if($partners): ?>
  <section class="block partners">
  	<header>
      <h1><?php echo pll__('partners'); ?></h1>
    </header>

    <div>
      <?php echo Projects\Projects::get_partners($partners); ?>
  	</div>
  </section>
<?php endif; ?>
