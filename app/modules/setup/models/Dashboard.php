<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\enums\Type_Relation;
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
        return 'dashboard';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [['inactive'], 'default', 'value' => Status_Active::No],
            [['description', 'roles'], 'string'],
            [[
                'route',
                'heading',
                'module',
                'icon',
            ], 'string', 'max' => 140 ],
            ['inactive', 'boolean']
        ]);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
                'id'  => Yii::t('app', 'Name'),
                'heading'  => Yii::t('app', 'Heading'),
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
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ],
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }

    public static function relations()
    {
        return [
            'widgets'   => [
                'class' => DashboardWidget::class,
                'type' => Type_Relation::ChildModel
            ],
        ];
    }

    public function getWidgets()
    {
        return $this->hasMany(DashboardWidget::class, ['dashboard_id' => 'id']);
    }
}
