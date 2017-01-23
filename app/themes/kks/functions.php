<?php
define('BASE', __DIR__);

$timber = new \Timber\Timber();

require_once BASE . '/core/frontend.php';
require_once BASE . '/core/backend.php';

// Init application
Core\Frontend::init();
Core\Backend::init();
