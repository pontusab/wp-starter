<?php namespace Core;

class Frontend {
	private static $instance;

  public static function init() {
    if (!isset(self::$instance)) self::$instance = new self;
    return self::$instance;
  }

  public function __construct() {
    add_filter('login_headerurl', [&$this, 'login_url']);
    add_filter('login_headertitle', [&$this, 'login_title']);
		add_action('login_enqueue_scripts', [&$this, 'login_style']);
    add_action('init', [&$this, 'remove_header_tags']);
    remove_filter('template_redirect', 'redirect_canonical');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_resource_hints', 2);

		add_filter( 'template_include', function($template) {
      return \Blade\Blade::make($template);
    }, 10,1 );

    add_filter('jpeg_quality', function() {
      return 55;
    });
  }

  public function remove_header_tags() {
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
  }

  public static function paging($found_posts, $current_page, $posts_per_page) {
    // Get the maximum amount of pages
    // Splits based on the value from $posts_per_page
    $maxnumpages = ceil( $found_posts / $posts_per_page );

    if ($maxnumpages > 1) {
      $output = '<ul class="paging">';
        $big = 999999999;
        $items = paginate_links([
          'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format'    => '?paged=%#%',
          'current'   => max(1, $current_page),
          'total'     => $maxnumpages,
					'type'      => 'array',
          'prev_next' => false,
        ]);

				for ($i=0; $i < count($items); $i++) {
					$selected = $current_page === $i + 1 ? 'class="selected"' : '';
					$output .= '<li '. $selected .'>'. $items[$i] .'</li>';
				}

      $output .= '</ul>';

      return $output;
    }
  }

  public static function simple_pagination() {
    $page = isset( $_POST['page'] ) ? $_POST['page']: 1;
    return '?page='. ( $page + 1 );
  }

  public function login_url() {
    return home_url();
  }

  public function login_title() {
    return get_option('blogname');
  }

	public function login_style() {
    // wp_enqueue_style('custom-login', str_replace('wp', '', site_url()) . '/css/login.css');
    // wp_enqueue_style('custom-stylesheet', str_replace('wp', '', site_url()) . '/css/stylesheet.css');
	}

  public static function has_children() {
    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    $child = get_post_ancestors( $post->ID );

    if (count($pages) > 0 || $child) return true;

		return false;
  }

	public static function get_id_by_template($template) {
    global $wpdb;

    $data = $wpdb->get_results('
        SELECT post_id
        FROM ' . $wpdb->prefix . 'postmeta
        WHERE meta_value
        LIKE ("%'. $template .'.php%")
    ', ARRAY_A );

    $parent_data = current($data);

    return pll_get_post($parent_data['post_id']);
  }

  public static function get_template_id($template) {
    global $wpdb;

    $data = $wpdb->get_results('
        SELECT post_id
        FROM ' . $wpdb->prefix . 'postmeta
        WHERE meta_value
        LIKE ("%'. $template .'.php%")
    ', ARRAY_A );

    $parent_data = current($data);

    return (int) $parent_data['post_id'];
  }

  public static function submenu() {
    global $post;
		$id = $post->ID;

		if (is_singular('post')) $id = self::get_id_by_template('news');

    $page_object = get_page($id);

    // Get the parent_id
    $parent_id = count($page_object->ancestors) > 0 ? $page_object->ancestors[count($page_object->ancestors) - 1] : $post->ID;

    // Add args for wp_list_pages
    $args = [
      'echo'      => 0,
      'title_li'  => '',
      'child_of'  => $parent_id,
      'walker'    => new SubWalker
    ];

    $parent = wp_list_pages(array_merge($args, ['include' => $parent_id]));
    $menu = wp_list_pages($args);

    if ($menu) return $parent . $menu;
  }

  public static function current_url() {
    global $wp;
    return add_query_arg( '', '', home_url( $wp->request ) );
  }

	public static function language_switcher() {
		$translations = pll_the_languages(['raw' => 1]);
		$current = pll_current_language('slug');

		$html = '';
		foreach ($translations as $t) {
			$active = $t['current_lang'] ? 'class="active"' : '';
			$html .= '<li '. $active .'>';
				$html .= '<a href="'. $t['url'] .'">'. $t['name'] .'</a>';
			$html .= '</li>';
		}

		return $html;
	}

	public static function get_posts_by_slug($string = false) {
		$exclude = [];
		$args = [
      'post_type'  => 'page',
      'meta_query' => [
        [
          'key' => 'exclude',
          'value' => true
        ]
      ]
  	];

		$posts = get_posts($args);
		foreach ($posts as $post) $exclude[] = $post->ID;
		if ($string) return implode(',', $exclude);

		return $exclude;
	}

	public static function get_parent_title() {
		global $post;
		$id = $post->ID;

		if (is_singular('post')) $id = self::get_id_by_template('news');

		$page_object = get_page($id);

    // Get the parent_id
    $parent_id = count($page_object->ancestors) > 0 ? $page_object->ancestors[count($page_object->ancestors) - 1] : $post->ID;

		return get_the_title($parent_id);;
	}

	public static function years($post_type = 'post') {
		$first = get_posts([
			'post_type'      => $post_type,
			'posts_per_page' => 1,
			'order'					 => 'ASC',
		]);

		$from = $first ? date('Y', strtotime(reset($first)->post_date)) : date('Y');
		$amount = date('Y') - $from;
		$years  = [];

		for ($i = 0; $i <= $amount; $i ++) {
			array_unshift($years, $from + $i);
		}

		return $years;
	}

	public static function highlight_result($content) {
		$clean_content = strip_tags($content);
		$query = get_search_query();

		if ($query) {
			$found_where = strpos($clean_content, $query) - 30;
			$text = wp_trim_words(substr($clean_content, $found_where), 16);

	    $highlighted = preg_filter('/' . preg_quote($query) . '/iu', '<strong>$0</strong>', $text);
	    if (!empty($highlighted)) {
				$clean_content = '...'. $highlighted;
			} else {
				$clean_content = '';
			}
		} else {
			$clean_content = wp_trim_words($clean_content, 16);
		}

		return strip_tags($clean_content, '<strong>');
	}

  public static function date($date) {
    $month = date_i18n('M', strtotime($date));

    if (pll_current_language() === 'sv') {
      return strtolower($month);
    }

    return $month;
  }
}
