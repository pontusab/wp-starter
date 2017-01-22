<?php
$protocol = 'http://';
$host = $_SERVER['HTTP_HOST'];

if ($_SERVER['HTTPS'] == 'on') {
 $protocol = 'https://';
}

$url = $protocol . $host;

define('WP_DEBUG', getenv('WP_DEBUG') || false);
define('FORCE_SSL_ADMIN', getenv('FORCE_SSL_ADMIN') || false);

// Database
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix  = 'wp_';

// Custom Settings
define('WP_DOMAIN', $host);
define('WP_HOME', $url);
define('WP_SITEURL', $url . '/wp');
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', __DIR__ . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);
define('WP_PLUGIN_URL', WP_HOME . '/app/plugins');
define('WPLANG', 'sv_SE');
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISALLOW_FILE_EDIT', true);

// Security
define('AUTH_KEY', getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('NONCE_KEY'));
define('AUTH_SALT', getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('NONCE_SALT'));

// Bootstrap WordPress
if (!defined('ABSPATH')) define( 'ABSPATH', __DIR__ . '/wp/' );
