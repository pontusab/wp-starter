<?php $researcher = Core\Profile::init()->get_user_page_id(true); ?>

<?php if($researcher): ?>
  <aside class="puff">
    <a href="<?php echo add_query_arg('preview', 'true', get_permalink($researcher)); ?>">
      <header>
        <h1><?php echo pll__('visit_title'); ?></h1>
      </header>
      <p class="more">
        <span><?php echo pll__('visit_url'); ?></span>
      </p>
    </a>
  </aside>
<?php endif; ?>
