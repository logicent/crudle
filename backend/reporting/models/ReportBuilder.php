<?php

namespace crudle\app\reporting\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\crud\enums\Type_Relation;
use crudle\app\crud\models\ActiveRecord;
use crudle\app\user\enums\Permission_Group;
use crudle\app\user\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "report_builder".
 *
 * @property ReportBuilderItem[] $reportBuilderItems
 */
class ReportBuilder extends ActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return '{{%Report_Builder}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['id'], 'required'],
            [['id', 'model_name', 'group', 'type', 'title', 'subtitle'], 'string', 'max' => 140],
            [['inactive'], 'boolean'],
            ['roles', 'safe'], // 'allow_roles'
            // 'is_custom', 'custom_style', 'custom_script', 'show_summary', 'show_charts'
            [['description', 'query_cmd'], 'string'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge($attributeLabels, [
            'id' => Yii::t('app', 'Name'),
            'model_name' => Yii::t('app', 'Model name'),
            'group' => Yii::t('app', 'Group'),
            'type' => Yii::t('app', 'Type'),
            'inactive' => Yii::t('app', 'Hidden'),
            'description' => Yii::t('app', 'Description'),
            'query_cmd' => Yii::t('app', 'Query command'),
            'title' => Yii::t('app', 'Title'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'roles' => Yii::t('app', 'Roles'),
        ]);
    }

    public static function permissions()
    {
        return array_merge(
            Type_Permission::enums(Permission_Group::Crud),
            Type_Permission::enums(Permission_Group::Data),
        );
    }

    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ]
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }

    public static function relations()
    {
        return [
            'reportBuilderItem'     => [
                'class' => ReportBuilderItem::class,
                'type' => Type_Relation::ChildModel
            ],
        ];
    }

    public function getReportBuilderItem()
    {
        return $this->hasMany(ReportBuilderItem::class, ['report_builder_id' => 'id']);
    }

    public static function mixedValueFields()
    {
        return [
            'roles',
        ];
    }

    public function beforeSave($insert)
    {
        if (! parent::beforeSave($insert))
            return false;

        $this->roles = is_array($this->roles) ? Json::encode($this->roles) : null;

        return true;
    }

    public function afterFind()
    {
        if (empty($this->roles))
            $this->roles = [];
        else
            $this->roles = Json::decode($this->roles);

        return parent::afterFind();
    }
}
