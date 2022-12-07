<?php

namespace crudle\app\user\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\auth\models\User as AuthUser;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 */
class User extends AuthUser
{
    // public $full_name;

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
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'status'
            ]
        ];
    }

    public static function permissions()
    {
        return array_merge(
            Type_Permission::enums(Permission_Group::Crud),
            // Type_Permission::enums(Permission_Group::Data),
        );
    }

    // public function fields()
    // {
    //     return [
    //         'full_name' => function () {
    //             return $this->first_name .' '. $this->last_name;
    //         }
    //     ];
    // }
}
