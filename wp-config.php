<?php
// Load composer
require_once(__DIR__ . '/vendor/autoload.php');

// Load env-file
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Load application and settings
require_once(dirname(__FILE__ ) . '/app.php');
require_once(ABSPATH . 'wp-settings.php');
