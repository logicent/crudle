<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\modules\main\models\auth\User as AuthUser;
use app\modules\setup\enums\Permission_Group;
use app\modules\setup\enums\Type_Permission;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 */
class User extends AuthUser
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    // public function rules()
    // {
    //     $rules = parent::rules();

    //     return ArrayHelper::merge([
    //     ], $rules);
    // }

    // public function attributeLabels()
    // {
    //     $attributeLabels = parent::attributeLabels();

    //     return ArrayHelper::merge([
    //     ], $attributeLabels);
    // }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Active::class,
        ];
    }

    public static function permissions()
    {
        return array_merge(
            Type_Permission::enums(Permission_Group::Crud),
            // Type_Permission::enums(Permission_Group::Data),
        );
    }
}
