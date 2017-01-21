<?php
$root = dirname( __DIR__ );
$protocol = 'http://';
$host = $_SERVER['HTTP_HOST'];

if ( $_SERVER['HTTPS'] == 'on' ) {
 $protocol = 'https://';
}

$url = $protocol . $host;

/*
|----------------------------------------------------------------
| Database
|----------------------------------------------------------------
*/

if (strpos($host, 'dev' ) !== false) {
	require 'local.php';
} else {
	require 'prod.php';
}

// Custom Settings
define( 'WP_DOMAIN', $host );
define( 'WP_HOME', $url );
define( 'WP_SITEURL', $url . '/wp' );
define( 'CONTENT_DIR', '/app' );
define( 'WP_CONTENT_DIR', $root . CONTENT_DIR );
define( 'WP_CONTENT_URL', WP_HOME . CONTENT_DIR );
define( 'WP_PLUGIN_URL', WP_HOME . '/app/plugins' );
define( 'WPLANG', 'sv_SE' );
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'DISALLOW_FILE_EDIT', true );


// Security
define( 'AUTH_KEY',         'NQ>lEh[l/oe<gzyRo~E153xRC=%J U0G-lHHE?J@G<vR3Y7+3s6,t>b(foxyC2`@' );
define( 'SECURE_AUTH_KEY',  '$9hW6mDX-<k+O$*$+ThiyN-Nx~$lU+1|gYtF1_8rAdH8tZXQ^wt$<8|Ttqt~Ki_$' );
define( 'LOGGED_IN_KEY',    'IPv>K5D@<14D3~lhiN7+9.C)hR:e`b^YbE7$Rii-r7O&{JAT@8<-t;9vbLE7rt>U' );
define( 'NONCE_KEY',        'uK#-o~B:xD}zq+!{I-Yph%1ak-#/H IR3= (*A/<x8k1NmZ@R2chl=9+<x,X^4cu' );
define( 'AUTH_SALT',        '3M96/#D,0bwBNhZ#eU2aTt^+*:]#ZLyz&l-M5~JOp[e$.^b9O-K?zYZ||_Ut7UsM' );
define( 'SECURE_AUTH_SALT', 'p|$0+%hhv|2f%5c#sJEi!*|/`XT [tw[2`{HZcmq|69 )Ly7V8v-)S}wAIon!/g`' );
define( 'LOGGED_IN_SALT',   '(o_8xd3TT}7!E=hyUsmm[BgOCuYSaeeTUM|:9N?&DN0~B$N5Ao.;d1WLj:G::3CP' );
define( 'NONCE_SALT',       'L,})$=srah]Qtdey?dlF.14^E9cv418sSsw_H4F<z+N2}^U)y0#.218zQO%~&tUs' );


// Bootstrap WordPress
if (!defined('ABSPATH')) define( 'ABSPATH', $root . '/wp/' );
