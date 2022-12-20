<?php
/**
 * Crudle bootstrap file.
 *
 * @link https://github.com/logicent/yii2-crudle
 * @copyright Copyright (c) Appsoft
 * @license https://github.com/logicent/yii2-crudle/LICENSE.md
 */

// Setup
// -----------------------------------------------------------------------------

$findConfig = function($constName, $argName) {
    if (defined($constName)) {
        return constant($constName);
    }

    if (!empty($_SERVER['argv'])) {
        foreach ($_SERVER['argv'] as $key => $arg) {
            if (strpos($arg, "--{$argName}=") !== false) {
                $parts = explode('=', $arg);
                $value = $parts[1];
                unset($_SERVER['argv'][$key]);
                return $value;
            }
        }
    }

    return null;
};

$findConfigPath = function($constName, $argName) use ($findConfig) {
    $path = $findConfig($constName, $argName);
    return $path ? realpath($path) : null;
};

$createFolder = function($path) {
    // Code borrowed from Io...
    if (!is_dir($path)) {
        $oldumask = umask(0);

        if (!mkdir($path, 0755, true)) {
            // Set a 503 response header so things like Varnish won't cache a bad page.
            http_response_code(503);
            exit('Tried to create a folder at ' . $path . ', but could not.' . PHP_EOL);
        }

        // Because setting permission with mkdir is a crapshoot.
        chmod($path, 0755);
        umask($oldumask);
    }
};

$ensureFolderIsReadable = function($path, $writableToo = false) {
    $realPath = realpath($path);

    // !@file_exists('/.') is a workaround for the terrible is_executable()
    if ($realPath === false || !is_dir($realPath) || !@file_exists($realPath . DIRECTORY_SEPARATOR . '.')) {
        // Set a 503 response header so things like Varnish won't cache a bad page.
        http_response_code(503);
        exit(($realPath !== false ? $realPath : $path) . ' doesn\'t exist or isn\'t writable by PHP. Please fix that.' . PHP_EOL);
    }

    if ($writableToo && !is_writable($realPath)) {
        // Set a 503 response header so things like Varnish won't cache a bad page.
        http_response_code(503);
        exit($realPath . ' isn\'t writable by PHP. Please fix that.' . PHP_EOL);
    }
};

// Determine the paths
// -----------------------------------------------------------------------------

// Set the vendor path. By default assume that it's 3 levels up from here
$vendorPath = $findConfigPath('--vendorPath', 'CRUDLE_VENDOR_PATH') ?? dirname(__DIR__, 2) . '/vendor';
// Set the "app root" path that contains app/, storage/, etc. By default assume that it's up a level from vendor/.
$rootPath = $findConfigPath('--basePath', 'CRUDLE_BASE_PATH') ?? dirname($vendorPath);
// By default the remaining directories will be in the base directory
$configPath = $findConfigPath('--configPath', 'CRUDLE_CONFIG_PATH') ?? "$rootPath/backend/_config";
$migrationsPath = $findConfigPath('--migrationsPath', 'CRUDLE_MIGRATIONS_PATH') ?? "$rootPath/database/migrations";
$storagePath = $findConfigPath('--storagePath', 'CRUDLE_STORAGE_PATH') ?? "$rootPath/storage";
// $templatesPath = $findConfigPath('--templatesPath', 'CRUDLE_TEMPLATES_PATH') ?? "$rootPath/templates";
// $translationsPath = $findConfigPath('--translationsPath', 'CRUDLE_TRANSLATIONS_PATH') ?? "$rootPath/translations";
$testsPath = $findConfigPath('--testsPath', 'CRUDLE_TESTS_PATH') ?? "$rootPath/tests";

// Set the environment
$environment = $findConfig('--env', 'CRUDLE_ENVIRONMENT') ?? $_SERVER['SERVER_NAME'] ?? null;

// Validate the paths
// -----------------------------------------------------------------------------
$ensureFolderIsReadable($storagePath, true);

// Create the storage/runtime/ folder if it doesn't already exist
$createFolder($storagePath . DIRECTORY_SEPARATOR . 'runtime');
$ensureFolderIsReadable($storagePath . DIRECTORY_SEPARATOR . 'runtime', true);

// Create the storage/logs/ folder if it doesn't already exist
$createFolder($storagePath . DIRECTORY_SEPARATOR . 'logs');
$ensureFolderIsReadable($storagePath . DIRECTORY_SEPARATOR . 'logs', true);

// Log errors to storage/logs/phperrors.log or php://stderr
ini_set('error_log', $storagePath . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'phperrors.log');

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

// Load the Composer dependencies and the app
// -----------------------------------------------------------------------------

// Set aliases
// Yii::setAlias('@appIcons', $srcPath . DIRECTORY_SEPARATOR . 'icons');
// Yii::setAlias('@config', $configPath);
Yii::setAlias('@dbMigrations', $migrationsPath);
Yii::setAlias('@storage', $storagePath);
// Yii::setAlias('@templates', $templatesPath);
// Yii::setAlias('@translations', $translationsPath);
Yii::setAlias('@tests', $testsPath);

Yii::setAlias('@crudle', $rootPath);
Yii::setAlias('@app', "@crudle/backend");
Yii::setAlias('@appModules', "@app");
Yii::setAlias('@appMain', '@appModules/main');
Yii::setAlias('@appSetup', '@appModules/setting');
// @appSettings GeneralSettings + Layout Settings
Yii::setAlias('@kitModule', "@crudle/codegen"); // or '@appKit', "@appModules/kit"
Yii::setAlias('@extModules', "@crudle/modules");
// Yii::setAlias('@usrModules', "@crudle/tenants/{$tenantId}/modules");