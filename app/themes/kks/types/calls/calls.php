<?php namespace Calls;

const TYPE = 'calls';

class Calls {
	public static $instance;

	public function __construct() {
		add_action('init', [&$this, 'register']);
	}

	public static function init() {
		if (!isset( self::$instance)) self::$instance = new self;
    return self::$instance;
	}

	public function register() {
		add_image_size(TYPE, 480, 1000 );

		register_post_type(TYPE, [
			'labels' => [
				'name' => __('Utlysningar'),
			],
			'public' => true,
			'menu_icon' => 'dashicons-megaphone',
			'supports' => [
				'title',
        'editor',
			],
		]);
	}

	public static function get_posts() {

	}
}
