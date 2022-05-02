<?php

// file 'DataModel.php'

// Naming Series for Master Data
// Numbering Series for Transaction Data

return [
    [
        'id' => 'Role',
        'alias' => '',
        'type' => 'core', // core/standard, addon/custom
        'namespace' => 'crudle\setup\models\auth\Role',
        'url' => '/setup/role/index',
        'series' => '',
        'serial' => 2,
        'name' => 'Role',
        'module' => 'setup',
        'menu_group' => 'master', // Master, Transaction, Setup, Report
        'visible' => true,
        'status' => 'prod' // prod/stable, dev/beta, alpha or TBD
    ],
];
