<?php if(isset($_GET['success']) && $_GET['success'] === 'true'): ?>
  <div id="message" class="updated">
    <p><?php echo pll__('settings_updated'); ?></p>
  </div>
<?php elseif(isset($_GET['success']) && $_GET['success'] === 'false'): ?>
  <div id="message" class="updated error">
    <p><?php echo pll__('settings_updated_error'); ?></p>
  </div>
<?php endif; ?>
