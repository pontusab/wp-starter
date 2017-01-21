<?php
// Registration
add_action('init', function() {
  $email = isset($_POST['resercher_email']) && is_email($_POST['resercher_email']) ? $_POST['resercher_email'] : false;
  $name = isset($_POST['resercher_name']) ? $_POST['resercher_name'] : false;

  if ($email && $name) {
    $to = get_option('admin_email');

    $subject = "Registrering som forskare";
    $content = '<strong>Name:</strong> '. $name .' <br /> <strong>E-post:</strong> '. $email .' <br />';

    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: '. $name .' <'. $email .'> ' . "\r\n";

    wp_mail($to, $subject, $content, $headers);
  }
});

add_filter('wp_mail_from', function() {
  return get_option('admin_email');
});

add_filter('wp_mail_from_name', function() {
  return get_option('blogname');
});
