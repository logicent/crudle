<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\modules\main\models\auth\Role as AuthRole;

class Role extends AuthRole
{
    public $id;
    public $status;

    public function afterFind()
    {
        $this->id = $this->name;
        $this->status = $this->inactive;

        return parent::afterFind();
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }
}
