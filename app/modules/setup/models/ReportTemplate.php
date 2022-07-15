<?php

namespace crudle\app\setup\models;

use crudle\app\enums\Status_Active;
use crudle\app\main\enums\Type_Relation;
use crudle\app\main\models\ActiveRecord;
use crudle\app\setup\enums\Permission_Group;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "report_template".
 */
class ReportTemplate extends ActiveRecord
{
    public $reports_count;

    public function init()
    {
        parent::init();
        $this->listSettings->listNameAttribute = 'id';
    }

    public static function tableName()
    {
        return 'report_template';
    }

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge([
            [['alias', 'description'], 'string'],
            // ['id', 'checkTemplateNotUsed', 'when' => 
            //     function ( $model, $attribute ) {
            //         return 
            //             !$model->isNewRecord && 
            //             $model->$attribute != $model->getOldAttributes()[$attribute];
            //     } 
            // ],
            [['inactive'], 'integer'],
            [['id', 'type'], 'string', 'max' => 140],
        ], $rules);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Code'),
            'description' => Yii::t('app', 'Description'),
            'alias' => Yii::t('app', 'Alias'),
            'type' => Yii::t('app', 'Type'),
            'inactive' => Yii::t('app', 'Hidden'),
        ];
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
            'templateSection' => [
                'class' =>  ReportTemplateItem::class,
                'type'  =>  Type_Relation::ChildModel,
            ],
        ];
    }

    public function getTemplateSection()
    {
        return $this->hasMany(ReportTemplateItem::class, ['template_id' => 'id'])
                    ->orderBy('level ASC');
    }

    public function listOptions_Range()
    {
        return $this->reports_count = range(0, 9);
    }    

    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert))
    //     {
    //         if (!$this->isNewRecord && $this->id != $this->getOldAttributes()['id'])
    //             return $this->templateIsUsed() == true;
    //     }
    //     else
    //         return false;
    // }

    public function checkTemplateNotUsed( $attribute, $params, $validator )
    {
        $modelClass = 'app\models\\' . $this->type;
        if ( $modelClass::find()->where(['report_template' => $this->getOldAttributes()[$attribute]])->count() > 0 )
        {
            $validator->addError($this, $attribute, Yii::t('app', 'The template can not be renamed as it is in use.'));
            return false;
        }
        // else
        return true;
    }

}
