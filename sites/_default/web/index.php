<?php
/**
 * Crudle web bootstrap file
 */

// Load shared bootstrap
require dirname(__DIR__, 2) . '/bootstrap.php';
// Load tenant bootstrap
require dirname(__DIR__, 1) . '/bootstrap.php';

require CRUDLE_VENDOR_PATH . '/yiisoft/yii2/Yii.php';

require CRUDLE_BASE_PATH . '/sites/config/bootstrap.php';
require SITE_BASE_PATH . '/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require CRUDLE_BASE_PATH . '/sites/config/web.php',
    require SITE_BASE_PATH . '/config/web.php',
);
// Load and run Crudle
// /** @var crudle\web\Application $app */
(new yii\web\Application($config))->run();
