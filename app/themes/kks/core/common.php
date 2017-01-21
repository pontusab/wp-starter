<?php namespace Core;

class Common {
  private static $Instance;

  public static function Instance() {
    if (!isset( self::$Instance)) self::$Instance = new self;
    return self::$Instance;
  }

  public function __construct() {
    add_action('wp_before_admin_bar_render', [&$this, 'remove_admin_bar_links']);
  }


  public function remove_admin_bar_links() {
    global $wp_admin_bar;

    $current_user = wp_get_current_user();
    $role = $current_user->roles[0];

    if ($role === 'editor') {
      $wp_admin_bar->remove_menu('new-page');
    }

    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('appearance');
    $wp_admin_bar->remove_menu('customize');
  }
}
