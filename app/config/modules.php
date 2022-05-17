<?php

use yii\helpers\FileHelper;
use yii\helpers\StringHelper;

$modules = [
    // core modules
    'main'  => crudle\app\main\Module::class,
    'setup' => crudle\app\setup\Module::class,
    // code module
    // 'kit' => crudle\kit\Module::class,
];

// user modules
$extPath = Yii::getAlias(('@extModules'));
$extDirs = FileHelper::findDirectories($extPath, ['recursive' => false]);

foreach ($extDirs as $extDir) {
    // check if sub dir is a module dir
    if (!file_exists($extDir . '/Module.php'))
        continue;
    $moduleDirname = StringHelper::basename($extDir);
    $config = require $extDir . '/config.php';
    // dynamically append module found in extPath
    $modules[$config['id']] = "crudle\\ext\\{$moduleDirname}\\Module";
}

return $modules;
