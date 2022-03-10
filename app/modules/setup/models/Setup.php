<?php

namespace app\modules\setup\models;

use app\modules\setup\enums\Type_Permission;

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
