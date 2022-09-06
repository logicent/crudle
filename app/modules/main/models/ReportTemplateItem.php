<?php

namespace crudle\app\main\models;

use crudle\app\main\enums\Rule_Scenario;
use crudle\app\main\models\ActiveRecordDetail;
use Yii;

/**
 * This is the model class for table "report_template_detail".
 */
class ReportTemplateItem extends ActiveRecordDetail
{
    public $actionType;
    public $results_count;

    public static function tableName()
    {
        return '{{%Report_Template_Detail}}';
    }

    public function rules()
    {
        return [
            [['section', 'template_id'], 'required'],
            [['code_prefix', 'alias', 'description'], 'string'],
            [['level', 'limit', 'hidden'], 'integer'],
            [['icon', 'color', 'section'], 'string', 'max' => 140],
            [['section', 'template_id'], 'unique', 'targetAttribute' => ['section', 'template_id']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'section' => Yii::t('app', 'Section name'),
            'template_id' => Yii::t('app', 'Template'),
            'description' => Yii::t('app', 'Description'),
            'code_prefix' => Yii::t('app', 'Code prefix'),
            'level' => Yii::t('app', 'Level'),
            'limit' => Yii::t('app', 'Limit'),
            'icon' => Yii::t('app', 'Icon'),
            'color' => Yii::t('app', 'Color'),
            'hidden' => Yii::t('app', 'Hidden'),
        ];
    }

    public function getTemplate()
    {
        return $this->hasOne(ReportTemplate::class, ['name' => 'template_id']);
    }

    public function afterFind()
    {
        $this->actionType = Rule_Scenario::Update;

        return parent::afterFind();
    }

    public function listOptions_Range()
    {
        return $this->results_count = range(0, 9);
    }

    public function getActionType()
    {
        return $this->actionType;
    }

    public function setActionType( $action_type )
    {
        $this->actionType = $action_type;
    }
}
