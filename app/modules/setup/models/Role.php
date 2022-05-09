<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\auth\Role as AuthRole;

class Role extends AuthRole
{
    public $id;
    public $status;

    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
    }

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
