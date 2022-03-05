<?php

// file 'UserManager.php'

return [
    'user_account',
    'user_auth',
    'user_profile',
    'user_role',
    'user_permission',
    'user_permission_rule',

    'user_group',
    'user_type',
    'user_settings', // i.e. preferences as user_id, doctype, data (json or text)

    'role',
    'role_permission',
    'role_permission_rule',
    'role_profile',

];

// Role Type

// Officer (User for standard operation)
// Manager (User for process management)
// Approver
// Guest (User for notifications/alerts)