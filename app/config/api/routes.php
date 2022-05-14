<?php

return [
    // ** api routes
    'api' => 'main/api/index', // defaultRoute requires this rule
    'api/login' => 'main/api/login',
    'api/logout' => 'main/api/logout',
    'api/forgot-password' => 'main/api/request-password-reset',
    'api/reset-password' => 'main/api/reset-password',

    // ** Crud action routes
    'api/<module>/<controller>/New' => '<module>/<controller>/create',
    // 'api/<module>/<controller>/<id:\w+>' => '<module>/<controller>/read',
    // 'api/<module>/<controller>/<id:\w+>' => '<module>/<controller>/update',

    'api/setup/user/my-account' => 'setup/user/update',
    'api/setup/user/my-preferences' => 'setup/user/edit-preferences',

    // Generic view-specific (generic) routes
    'api/<module>/<controller>' => '<module>/<controller>/index',
    // ***end api
];
