<?php

namespace crudle\setup\models;

use crudle\setup\enums\Type_Permission;

/**
 * This is the model class for page "Setup".
 */
class Setup extends Settings
{
    public static function permissions()
    {
        return [
            Type_Permission::List => Type_Permission::List,
        ];
    }
}
