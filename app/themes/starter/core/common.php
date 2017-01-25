<?php namespace Core;

class Common {
  private static $instance;

  public static function init() {
    if (!isset( self::$instance)) self::$instance = new self;
    return self::$instance;
  }

  public function __construct() {
    add_action('wp_before_admin_bar_render', [&$this, 'remove_admin_bar_links']);
  }

  public function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('appearance');
    $wp_admin_bar->remove_menu('customize');
  }
}

Common::init();
