<?php

namespace crudle\app\user\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\auth\models\Role as AuthRole;

class Role extends AuthRole
{
    public function init()
    {
        parent::init();
        $this->listSettings->listIdAttribute = 'name';
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ]
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }
}
