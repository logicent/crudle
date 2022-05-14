<?php
/**
 * Shared bootstrap file
 */

// Define path constants
define('CRUDLE_BASE_PATH', __DIR__);
define('CRUDLE_VENDOR_PATH', CRUDLE_BASE_PATH . '/vendor');

// Load Composer's autoloader
require_once CRUDLE_VENDOR_PATH . '/autoload.php';

// Load dotenv?
if (class_exists(Dotenv\Dotenv::class)) {
    // By default, this will allow .env file values to override environment variables
    // with matching names. Use `createUnsafeImmutable` to disable this.
    Dotenv\Dotenv::createUnsafeMutable(CRUDLE_BASE_PATH)->safeLoad();
}


// Determine if Crudle is running in Dev Mode
// -----------------------------------------------------------------------------

use crudle\app\helpers\App;

$devMode = (bool) App::env('CRUDLE_APP_DEBUG') ?? false;

if ($devMode) {
    ini_set('display_errors', '1');
    defined('YII_DEBUG') || define('YII_DEBUG', true);
    defined('YII_ENV') || define('YII_ENV', 'dev');
} else {
    ini_set('display_errors', '0');
    defined('YII_DEBUG') || define('YII_DEBUG', false);
    defined('YII_ENV') || define('YII_ENV', 'prod');
}

// Ensure you're running PHP 7.4+
if (PHP_VERSION_ID < 70400) {
    exit('Crudle requires PHP 7.4');
}
