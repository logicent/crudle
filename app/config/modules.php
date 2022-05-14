<?php

return [
    // core modules
    'main'  => crudle\app\main\Module::class,
    'setup' => crudle\app\setup\Module::class,
    // code module
    'kit' => crudle\kit\Module::class,
    // user modules
    'web-cms'   => crudle\ext\web_cms\Module::class,
];
