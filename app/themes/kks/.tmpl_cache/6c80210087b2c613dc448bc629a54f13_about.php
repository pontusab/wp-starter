<?php $intro = get_field('intro');
  $url = get_field('url');; ?>

<?php if($intro): ?>
  <aside>
    <a href="<?php echo $url; ?>">
      <p><?php echo $intro; ?></p>
      <p class="more">
        <span><?php echo pll__('read_more'); ?></span>
      </p>
    </a>
  </aside>
<?php endif; ?>
