<?php

// file 'DataModel.php'

// Naming Series for Master Data
// Numbering Series for Transaction Data

return [
    [
        'id' => 'Role',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => '\app\modules\main\models\setup\Role',
        'url' => '/setup/role/index',
        'series' => '',
        'serial' => 2,
        'name' => 'Role',
        'module' => 'setup',
        'column' => 'left',
        'group' => 'master', // Master, Transaction, Setup, Report
        'show_icon' => false,
        'icon' => '',
        'icon_color' => 'teal',
        'icon_img' => '',
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
    [
        'id' => 'DataImportTool',
        'type' => 'core', // core/standard, addon/custom
        'name' => 'Data Import Tool',
        'group' => 'setup', // Master, Transaction, Setup, Report        
        'serial' => 1,
        'url' => 'setup/data-tool/index',
        'show_icon' => false,
        'icon' => 'tag',
        'icon_color' => 'green',
        'icon_img' => '',        
        'module' => 'setup',
        'visible' => true
    ],
];
