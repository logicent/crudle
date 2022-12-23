<?php

namespace crudle\app\report\models;

use crudle\app\crud\models\BaseActiveRecordDetail;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_query_item".
 *
 * @property ReportQuery $reportQuery
 */
class ReportQueryItem extends BaseActiveRecordDetail
{
    public static function tableName()
    {
        return '{{%Report_Query_Item}}';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['id', 'attribute_name', 'default_value'], 'string', 'max' => 140],
            [['sort_order'], 'string', 'max' => 20],
            [['sort_by', 'filter_by', 'hidden'], 'boolean'],
            [['select_function', 'select_expression'], 'string'],
        ], $rules);
    }

    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();

        return ArrayHelper::merge([
            'id' => Yii::t('app', 'ID'),
            'attribute_name' => Yii::t('app', 'Attribute name'),
            'default_value' => Yii::t('app', 'Default value'),
            'sort_by' => Yii::t('app', 'Sort by'),
            'sort_order' => Yii::t('app', 'Sort order'),
            'filter_by' => Yii::t('app', 'Filter by'),
            'select_function' => Yii::t('app', 'Select function'),
            'select_expression' => Yii::t('app', 'Select expression'),
        ], $attributeLabels);
    }

    public function getReportQuery()
    {
        return $this->hasOne(ReportQuery::class, ['id' => 'query_id']);
    }

    public static function foreignKeyAttribute()
    {
        return 'query_id';
    }
}
