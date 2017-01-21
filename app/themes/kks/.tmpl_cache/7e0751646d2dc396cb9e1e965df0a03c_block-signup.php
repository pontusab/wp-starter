<?php $registration = get_field('registration', $post->ID);
  $start_date = get_field('start_date', $post->ID);
  $form = get_field('form', $post->ID);
  $class = !empty($form) ? 'registration' : '';; ?>

<?php if($start_date >= date('Y-m-d') && !empty($form) || !empty($registration)): ?>
  <?php if(!empty($_POST['seminar_name']) && !empty($_POST['seminar_email'])): ?>
    <p><?php echo pll__('seminair_thanks'); ?></p>
  <?php else: ?>
    <section class="signup <?php echo $class; ?>">
      <header>
        <h1><?php echo pll__('signup'); ?></h1>
      </header>
      <div>
        <?php if(empty($form)): ?>
          <?php echo $registration; ?>
        <?php else: ?>
          <form method="post">
            <label for="name"><?php echo pll__('seminar_name'); ?></label>
            <input type="text" required name="seminar_name" id="name" />
            <label for="organization"><?php echo pll__('organization'); ?></label>
            <input type="text" name="organization" id="organization" />
            <label for="email"><?php echo pll__('email'); ?></label>
            <input type="email" required name="seminar_email" id="email" />
            <input type="submit" value="<?php echo pll__('signup'); ?>" />
          </form>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>
