<?php

namespace app\modules\setup\models;

use app\enums\Status_Transaction;
use app\modules\setup\enums\Type_Permission;
use app\models\base\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "data_model".
 */
class DataModel extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_data_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'module'], 'required'],
            [['max_attachments', 'hide_copy', 'is_table', 'quick_entry', 'track_changes', 'track_views', 'allow_auto_repeat', 'allow_import'], 'integer'],
            [['search_fields'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'module', 'title_field', 'image_field', 'sort_field', 'sort_order', 'created_by', 'updated_by'], 'string', 'max' => 140],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'module' => Yii::t('app', 'Module'),
            'title_field' => Yii::t('app', 'Title Field'),
            'image_field' => Yii::t('app', 'Image Field'),
            'max_attachments' => Yii::t('app', 'Max Attachments'),
            'hide_copy' => Yii::t('app', 'Hide Copy'),
            'is_table' => Yii::t('app', 'Is Table'),
            'quick_entry' => Yii::t('app', 'Quick Entry'),
            'track_changes' => Yii::t('app', 'Track Changes'),
            'track_views' => Yii::t('app', 'Track Views'),
            'allow_auto_repeat' => Yii::t('app', 'Allow Auto Repeat'),
            'allow_import' => Yii::t('app', 'Allow Import'),
            'search_fields' => Yii::t('app', 'Search Fields'),
            'sort_field' => Yii::t('app', 'Sort Field'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    public function getDataModelFields()
    {
        return $this->hasMany(DataModelField::class, [ 'data_model' => 'name' ]);
    }

    // Workflow Interface
    public function hasWorkflow()
    {
        return false;
    }

    public static function permissions()
    {
        return Type_Permission::enums();
    }

    public static function enums()
    {
        return [
            'status' => Status_Transaction::class
        ];
    }

    public function createTable()
    {
        $columns = [];
        // \yii\helpers\VarDumper::dump($this->dataModelFields, 3, true);exit;
        foreach ($this->dataModelFields as $dataModelField) {
            $columns[$dataModelField->name] = DataModelField::getDbType()[$dataModelField->type];

            if ( !empty($dataModelField->length) ) 
                $columns[$dataModelField->name] .= '('. $dataModelField->length . ') ';

            if ( (bool) $dataModelField->mandatory === true )
                $columns[$dataModelField->name] .= DataModelField::dbColumnAttributeConstraints()['mandatory'];

            if ( (bool) $dataModelField->unique == true ) 
                $columns[$dataModelField->name] .= DataModelField::dbColumnAttributeConstraints()['unique'];
                
            if ( !empty($dataModelField->default ) ) 
                $columns[$dataModelField->name] .= " DEFAULT " . " '" .$dataModelField->default . "' " ;
        }       
        // $options = '';
        return Yii::$app->db->createCommand()->createTable($this->name, $columns)->execute();
    }

    // public function alterTable()
    // {
    //     $columns = [];
    //     foreach ($this->dataModelFields as $dataModelField)
    //         $columns[$dataModelField->name] = DataModelField::getDbType()[$dataModelField->type];
    //     // $options = '';
    //     return Yii::$app->db->createCommand()->createTable($this->name, $columns)->execute();
    // }
}
