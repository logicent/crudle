<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\models\base\BaseActiveRecord;
use crudle\app\setup\enums\Permission_Group;
use crudle\app\setup\enums\Status_Transaction;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "app_dashboard".
 */
class Dashboard extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return 'app_dashboard';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'name',
                'description',
                'module',
                'roles',
            ], 'string', 'max' => 140 ],
            [['inactive', 'boolean']]
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
                'name'  => Yii::t('app', 'Name'),
                'description'    => Yii::t('app', 'Description'),
                'module'    => Yii::t('app', 'Module'),
                'roles'   => Yii::t('app', 'Roles'),
                'inactive'   => Yii::t('app', 'Inactive'),
        ]);
    }

    // Workflow Interface
    public static function permissions()
    {
        return Type_Permission::enums(Permission_Group::Crud);
    }

    // ActiveRecord Interface
    public static function enums()
    {
        return [
            'status' => Status_Transaction::class,
            // 'inactive' => Status_Active::class,
        ];
    }
}
