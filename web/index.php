<?php
/**
 * Crudle web bootstrap file
 */

// Load shared bootstrap
require dirname(__DIR__) . '/bootstrap.php';

require CRUDLE_VENDOR_PATH . '/yiisoft/yii2/Yii.php';

require CRUDLE_BASE_PATH . '/config/bootstrap.php';
$config = require CRUDLE_BASE_PATH . '/config/web.php';

// Load and run Crudle
// /** @var crudle\web\Application $app */
(new yii\web\Application($config))->run();
