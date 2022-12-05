<?php

namespace crudle\app\user\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\main\enums\Type_Relation;
use crudle\app\user\models\base\UserLog as AuthUserLog;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_log".
 */
class UserLog extends AuthUserLog
{
    public $username;

    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'username';
    }

    // public function rules()
    // {
    //     $rules = parent::rules();

    //     return ArrayHelper::merge([
    //     ], $rules);
    // }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'user_id' => Yii::t('app', 'User name'),
            // 'status' => Yii::t('app', 'Inactive'),
        ]);
    }

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
        return [
            Type_Permission::List => Type_Permission::List,
            Type_Permission::Read => Type_Permission::Read,
        ];
    }

    public static function relations()
    {
        return [
            'user'  => [
                'class' => User::class,
                'type' => Type_Relation::ParentModel
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function afterFind()
    {
        $this->username = $this->getUser()->one()->username;

        return parent::afterFind();
    }

    // public function fields()
    // {
    //     return [
    //         'username' => function () {
    //             return $this->getUser()->username;
    //         }
    //     ];
    // }
}
