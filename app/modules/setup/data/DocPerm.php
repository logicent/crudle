<?php

// DocPerm.php

return [
    [
        'id' => 'role', // 140
        'name' => 'Role',
        'visible' => true
    ],
    [
        'id' => 'create',
        'name' => 'New',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'submit',
        'name' => 'Submit',
        'visible' => true // Check user permission
    ],
    [
        'id' => 'read',
        'name' => 'Read',
        'visible' => true
    ],
    [
        'id' => 'write',
        'name' => 'Write',
        'visible' => true
    ],
    [
        'id' => 'update',
        'name' => 'Update',
        'visible' => false // Check user permission and lockUpdate
    ],
    [
        'id' => 'cancel',
        'name' => 'Cancel',
        'visible' => false // Check user permission and lockCancel
    ],
    [
        'id' => 'delete',
        'name' => 'Delete',
        'visible' => false // Check user permission and lockDelete
    ],
    [
        'id' => 'duplicate',
        'name' => 'Duplicate',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'amend',
        'name' => 'Amend',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'print',
        'name' => 'Print',
        'visible' => true // Check user permission
    ],
    [
        'id' => 'email',
        'name' => 'Email',
        'visible' => true // Check user permission    
    ],
    [
        'id' => 'export',
        'name' => 'Export',
        'visible' => false // Check user permission       
    ],
    [
        'id' => 'import',
        'name' => 'Import',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'report',
        'name' => 'Report',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'share',
        'name' => 'Share',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'apply_user_permissions',
        'name' => 'Apply User Permissions',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'set_user_permissions',
        'name' => 'Set User Permissions',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'user_perm_doctypes', // long_text
        'name' => 'User Permission DataModels',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'if_owner',
        'name' => 'If Owner',
        'visible' => false // Check user permission
    ],
    [
        'id' => 'permlevel',
        'name' => 'Permission Level',
        'visible' => false // Check user permission
    ],
    // *match
];