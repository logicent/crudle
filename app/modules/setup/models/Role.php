<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\auth\Role as AuthRole;

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
}
