<?php $user = wp_get_current_user(); ?>

<?php if(is_user_logged_in()): ?>
  <form method="post" action="">
    <div class="acf-field acf-field-text" >
    	<div class="acf-label">
    		<label for="first_name"><?php echo pll__('settings_first_name'); ?></label>
    	</div>
    	<div class="acf-input">
    		<div class="acf-input-wrap">
          <input type="text" id="first_name" name="first_name" value="<?php echo $user->first_name; ?>" required>
        </div>
    	</div>
    </div>

    <div class="acf-field acf-field-text" >
    	<div class="acf-label">
    		<label for="last_name"><?php echo pll__('settings_last_name'); ?></label>
    	</div>
    	<div class="acf-input">
    		<div class="acf-input-wrap">
          <input type="text" id="last_name" name="last_name" value="<?php echo $user->last_name; ?>" required>
        </div>
    	</div>
    </div>

    <div class="acf-field acf-field-email" >
    	<div class="acf-label">
    		<label for="email"><?php echo pll__('settings_email'); ?></label>
    	</div>
    	<div class="acf-input">
    		<div class="acf-input-wrap">
          <input type="email" id="email" name="email" value="<?php echo $user->user_email; ?>" required>
        </div>
    	</div>
    </div>

    <div class="acf-field acf-field-password" >
    	<div class="acf-label">
    		<label for="password"><?php echo pll__('settings_new_password'); ?></label>
        <p class="description"><?php echo pll__('settings_new_password_desc'); ?></p>
    	</div>
    	<div class="acf-input">
    		<div class="acf-input-wrap">
          <input type="password" id="password" name="password" value="">
        </div>
    	</div>
    </div>

    <div class="acf-form-submit">
      <?php echo wp_nonce_field('setings_update'. $user->ID); ?>
  		<input type="submit" class="acf-button button button-primary button-large" value="<?php echo pll__('settings_update'); ?>">
  	</div>
  </form>
<?php endif; ?>
