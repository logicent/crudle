<?php

namespace crudle\main\models\auth;

use crudle\setup\enums\Type_Permission;
use app\enums\Type_Model;

class RolePermission extends Item
{
    public $display_name;
    // public $permission_level, $if_owner, $apply_user_permissions, $set_user_permissions;
    
    public function init()
    {
        $this->type = parent::TYPE_PERMISSION;
    }

    public function getAuthItemAttributes()
    {
        return parent::attributes();
    }

    public static function getValueIf($permission, $role)
    {
        return ItemChild::find()->where(['child' => $permission, 'parent' => $role])->exists();
    }

    public static function getPermissionList()
    {
        $resources = Type_Model::enums();
        $operations = Type_Permission::enums();
        $permissions = [];
        foreach ( $resources as $resource )
            foreach ( $operations as $operation )
                $permissions[] = $operation .' '. $resource;

        return $permissions;
    }
}