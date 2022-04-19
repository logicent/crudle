<?php

namespace crudle\setup\enums;

use Yii;

// Custom Roles
// ------------
// Additional roles that may be defined by System Manager(s) and/or Administrator user
// e.g. 

class Type_Role
{
    // system roles
    const Administrator = 'Administrator'; // disallow visibility, rename and/or delete
    const SystemManager = 'System Manager'; // disallow rename and/or delete
    // business domain roles

    public static function enums()
    {
        return [
            self::Administrator => Yii::t('app', 'Administrator'),
            self::SystemManager => Yii::t('app', 'System Manager'),
        ];
    }

    public static function domainRoles()
    {
        return [
        ];
    }
}