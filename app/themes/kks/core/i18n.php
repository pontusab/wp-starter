<?php
// Register theme strings for translation
add_action('admin_init', function() {
  $strings = [];

  foreach ($strings as $key => $name) {
    pll_register_string($key, $name, DOMAIN);
  }
});
