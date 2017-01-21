<?php
// Global Paths
define('BASE_URL', get_site_url());
define('BASE', __DIR__);
define('MODULES_DIR', 'modules');
define('VIEWS_DIR', BASE . '/views');

// Global Info
define('VER', '1');
define('DOMAIN', 'kunskapsformedlingen');
date_default_timezone_set('Europe/Stockholm');
setlocale(LC_ALL, 'sv_SE');

// Load Core
require_once BASE . '/core/walker.php';
require_once BASE . '/core/backend.php';
require_once BASE . '/core/common.php';
require_once BASE . '/core/frontend.php';
require_once BASE . '/core/extensions.php';
require_once BASE . '/core/i18n.php';
require_once BASE . '/core/blade/blade.php';


// Types
require_once BASE . '/types/calls/calls.php';


// Init application
Core\Frontend::init();
Core\Backend::Instance();
Core\Common::Instance();


// Init Post Types
Calls\Calls::init();
