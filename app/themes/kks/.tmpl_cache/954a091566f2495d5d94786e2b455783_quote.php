<?php $quote = get_field('quote');
  $source = get_field('source');; ?>

<?php if($quote && $source): ?>
  <blockquote>
    <p class="quote"><?php echo $quote; ?></p>
    <p class="quotee"><?php echo $source; ?></p>
  </blockquote>
<?php endif; ?>
