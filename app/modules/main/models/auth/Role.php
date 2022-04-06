<?php

namespace app\modules\main\models\auth;

use app\modules\setup\enums\Type_Permission;

class Role extends Item
{
    public function getRoleAssignee()
    {
        return Assignment::find()->select('user_id')->where(['item_name' => $this->name])->column();
    }

    public function hasPermissions()
    {
        return ItemChild::find()->where(['parent' => $this->name])->count() > 0;
    }

    public function getAssignedPermissions()
    {
        return ItemChild::find()->select('child')->where(['parent' => $this->name])->column();
    }

    public function hasThisPermission($permission, $roleName)
    {

        return ItemChild::find()->where(['child' => $permission, 'parent' => $roleName])->exists();
    }

    public function hasRule()
    {
        return Rule::find()->where(['name' => 'is' . $this->name])->count() > 0;
    }

    public function getRules()
    {
        return Rule::find()->where(['name' => 'is' . $this->name])->all();
    }

    public static function selectableItemsConfig()
    {
        return [];
    }

    public static function permissions()
    {
        return [
            Type_Permission::List => Type_Permission::List,
            Type_Permission::Create => Type_Permission::Create,
            Type_Permission::Read => Type_Permission::Read,
            Type_Permission::Update => Type_Permission::Update,
            Type_Permission::Delete => Type_Permission::Delete,
        ];
    }

}
