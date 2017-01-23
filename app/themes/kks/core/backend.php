<?php

namespace Core;

add_action('admin_init', function() {
  new Backend();
});

class Backend {
  private static $instance;

  public static function init() {
    if (!isset(self::$instance)) self::$instance = new self;
    return self::$instance;
  }

  public function __construct() {
    add_action('wp_dashboard_setup', array( &$this, 'remove_dashboard_widgets'));
    add_action('admin_init', array( &$this, 'remove_screen_metaboxes'));
    add_action('admin_head', array( &$this, 'remove_menu_pages'));
    add_filter('admin_footer_text', array( &$this, 'remove_footer_admin'));

    add_filter('tiny_mce_before_init', [&$this, 'tiny_mce_before_init'], 99);
    add_filter('mce_buttons', [&$this, 'tinymce_editor_buttons'], 99);
    add_filter('mce_buttons_2', [&$this, 'tinymce_editor_buttons_second_row'], 99);
    add_action('init', array( &$this, 'tinymce_style'));

    add_action('widgets_init', array( &$this, 'unregister_widgets'), 1);
    add_filter('sanitize_file_name', array( &$this, 'sanitize_file_name'), 10, 2);

    add_filter('pre_site_transient_update_core', array( &$this, 'remove_core_updates'));
    add_filter('pre_site_transient_update_plugins', array( &$this, 'remove_core_updates'));
    add_filter('pre_site_transient_update_themes', array( &$this, 'remove_core_updates'));

    add_action('admin_menu', [&$this, 'change_post_menu']);
    add_action('admin_menu', [&$this, 'change_post_menu_admin_bar']);

    add_action('init', [&$this, 'change_post_object']);
    add_action('admin_enqueue_scripts', [&$this, 'admin_style']);
  }


  public function unregister_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
  }


  public function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  }

  public function remove_screen_metaboxes() {
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('trackbacksdiv', 'post', 'normal');
    remove_meta_box('tagsdiv-post_tag', 'post', 'normal');
    remove_meta_box('categorydiv', 'post', 'normal');
  }

  public function change_post_menu() {
  	global $menu;
  	global $submenu;
  	$menu[5][0] = 'Nyheter';
  	$submenu['edit.php'][5][0] = 'Nyheter';
  }

  public function change_post_menu_admin_bar() {
    global $wp_post_types;
    $postLabels = $wp_post_types['post']->labels;
    $postLabels->name = 'Nyheter';
    $postLabels->singular_name = 'Nyhet';
    $postLabels->edit_item = 'Redigera nyhet';
    $postLabels->new_item = 'Nyhet';
    $postLabels->view_item = 'Visa nyhet';
    $postLabels->search_items = 'Sök nyheter';
    $postLabels->not_found = 'Inga nyheter hittades';
    $postLabels->not_found_in_trash = 'Inga nyheter hittades i papperskorgen';
    $postLabels->name_admin_bar = 'Nyhet';
  }

  public function change_post_object() {
    global $wp_post_types;

    $labels                     = &$wp_post_types['post']->labels;
    $labels->name               = 'Nyheter';
    $labels->singular_name      = 'Nyhet';
    $labels->add_new            = 'Skapa ny';
    $labels->add_new_item       = 'Skapa ny nyhet';
    $labels->edit_item          = 'Redigera nyhet';
    $labels->new_item           = 'Skapa ny';
    $labels->view_item          = 'Visa nyhet';
    $labels->search_items       = 'Sök nyheter';
  }

  public function remove_menu_pages() {
    $show  = isset( $_GET['show'] ) ? $_GET['show'] : null;

    if (!$show == 'all') {
      remove_menu_page('tools.php');
      remove_menu_page('plugins.php');
      remove_menu_page('themes.php');
      remove_menu_page('edit-comments.php');
      remove_submenu_page('index.php', 'update-core.php');

      if (getenv('WP_ENV') !== 'development') {
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_submenu_page('options-general.php', 'options-writing.php');
        remove_submenu_page('options-general.php', 'options-reading.php');
        remove_submenu_page('options-general.php', 'options-media.php');
        remove_submenu_page('options-general.php', 'options-discussion.php');
        remove_submenu_page('options-general.php', 'options-permalink.php');
      }
    }
  }

  public function tiny_mce_before_init($settings) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;';
    return $settings;
  }

  public function tinymce_editor_buttons($buttons) {
    return [
      'formatselect',
      'bold',
      'italic',
      'link',
      'bullist',
      // 'undo',
      // 'redo',
      // 'separator',
      // 'underline',
      // 'strikethrough',
      // 'separator',
      // 'separator',
    ];
  }

  public function tinymce_editor_buttons_second_row($buttons) {
    return [];
  }


  public function tinymce_style() {
    add_editor_style( home_url() . '/assets/css/editor.css' );
  }


  public function admin_style() {
    wp_enqueue_style('admin-style', str_replace('wp', '', site_url()) . '/assets/css/admin.css', null, 2);
	}

  public function remove_footer_admin() {
    return;
  }

  public function remove_core_updates() {
    global $wp_version;
    return (object) ['last_checked'=> time(),'version_checked'=> $wp_version];
  }


  public function sanitize_file_name($filename) {
    $sanitized_filename = remove_accents($filename); // Convert to ASCII

  	// Standard replacements
  	$invalid = array(
  		' ' => '-',
  		'%20' => '-',
  		'_' => '-'
  	);
  	$sanitized_filename = str_replace(array_keys($invalid), array_values($invalid), $sanitized_filename);

  	$sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
  	$sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
  	$sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
  	$sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
  	$sanitized_filename = strtolower($sanitized_filename); // Lowercase

  	return $sanitized_filename;
  }
}
