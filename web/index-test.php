<?php
/**
 * Crudle test bootstrap file
 */

// Load shared bootstrap
require dirname(__DIR__, 2) . '/bootstrap.php';

// NOTE: Disallow access to this file when running in production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

require CRUDLE_VENDOR_PATH . '/yiisoft/yii2/Yii.php';

require CRUDLE_BASE_PATH . '/config/bootstrap.php';
$config = require CRUDLE_BASE_PATH . '/config/test.php';

(new yii\web\Application($config))->run();
