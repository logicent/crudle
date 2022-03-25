<?php

namespace app\modules\setup\models;

use app\enums\Status_Active;
use app\enums\Type_Relation;
use app\models\base\BaseActiveRecord;
use app\modules\setup\enums\Permission_Group;
use app\modules\setup\enums\Type_Permission;
use app\modules\setup\models\ListViewSettingsForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * This is the model class for table "report_builder".
 *
 * @property ReportBuilderItem[] $reportBuilderItems
 */
class ReportBuilder extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'id'; // override in view index
    }

    public static function tableName()
    {
        return 'report_builder';
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
            'inactive' => Status_Active::class
        ];
    }

    public static function autoSuggestIdValue()
    {
        return false;
    }

    public static function relations()
    {
        return [
            'reportBuilderItems'     => [
                'class' => ReportBuilderItem::class,
                'type' => Type_Relation::ChildModel
            ],
        ];
    }

    public function getReportBuilderItems()
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
