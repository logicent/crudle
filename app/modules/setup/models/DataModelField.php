<?php

namespace crudle\app\setup\models;

use crudle\app\main\models\ActiveRecordDetail;
use Yii;
use yii\db\Schema;

/**
 * This is the model class for table "data_model_field".
 */
class DataModelField extends ActiveRecordDetail
{
    // const COLUMN_RENAME = 'rename';
    // const COLUMN_ADD_UNIQUE = 'add_unique';
    // const COLUMN_DROP_UNIQUE = 'drop_unique';
    const COLUMN_CHANGE_TYPE = 'alter column';
    // const COLUMN_RENAME = 'rename';

    const ACTION_TYPE_CREATE = 'create';
    const ACTION_TYPE_UPDATE = 'update';
    const ACTION_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_ACTION = 'batchAction';

    public $changedDbColumn;

    private $_actionType;

    public function getActionType()
    {
        if (empty($this->_actionType)) {
            if ($this->isNewRecord) {
                $this->_actionType = self::ACTION_TYPE_CREATE;
            } else {
                $this->_actionType = self::ACTION_TYPE_UPDATE;
            }
        }

        return $this->_actionType;
    }

    public function setActionType($value)
    {
        $this->_actionType = $value;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Data_Model_Field}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['actionType', 'required', 'on' => self::SCENARIO_BATCH_ACTION],
            ['actionType',
                'in', 'range' => [
                    self::ACTION_TYPE_CREATE,
                    self::ACTION_TYPE_UPDATE,
                    self::ACTION_TYPE_DELETE
                ], 'on' => self::SCENARIO_BATCH_ACTION
            ],
            ['model_name', 'required', 'except' => self::SCENARIO_BATCH_ACTION],
            [['field_name', 'field_type', 'model_name'], 'required'],
            [[
                'length', 'mandatory', 'unique', 'in_list_view', 'in_standard_filter', 'in_global_search',
                'bold', 'allow_in_quick_entry', 'translatable', 'fetch_from', 'fetch_if_empty',
                'ignore_user_permissions', 'allow_on_submit', 'report_hide', 'perm_level', 'hidden',
                'readonly', 'in_filter', 'print_hide', 'print_width', 'width', 'col_index', 'col_side'
            ], 'integer'],
            [['options'], 'string'],
            [[
                'field_name', 'model_name', 'label', 'db_type', 'depends_on', 'mandatory_depends_on',
                'readonly_depends_on', 'default', 'description'], 'string', 'max' => 140],
            [['field_name', 'model_name'], 'unique', 'targetAttribute' => ['field_name', 'model_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'label' => Yii::t('app', 'Label'),
            'model_name' => Yii::t('app', 'Data model'),
            'field_name' => Yii::t('app', 'Field name'),
            'field_type' => Yii::t('app', 'Field type'),
            'db_type' => Yii::t('app', 'Db type'),
            'mandatory' => Yii::t('app', 'Mandatory'),
            'unique' => Yii::t('app', 'Unique'),
            'length' => Yii::t('app', 'Length'),
            'options' => Yii::t('app', 'Options'),
            'in_list_view' => Yii::t('app', 'In list view'),
            'in_standard_filter' => Yii::t('app', 'In standard filter'),
            'in_global_search' => Yii::t('app', 'In global search'),
            'bold' => Yii::t('app', 'Bold'),
            'allow_in_quick_entry' => Yii::t('app', 'Allow In Quick Entry'),
            'translatable' => Yii::t('app', 'Translatable'),
            'fetch_from' => Yii::t('app', 'Fetch from'),
            'fetch_if_empty' => Yii::t('app', 'Fetch if empty'),
            'depends_on' => Yii::t('app', 'Depends on'),
            'ignore_user_permissions' => Yii::t('app', 'Ignore user permissions'),
            'allow_on_submit' => Yii::t('app', 'Allow on submit'),
            'report_hide' => Yii::t('app', 'Report hide'),
            'perm_level' => Yii::t('app', 'Perm level'),
            'hidden' => Yii::t('app', 'Hidden'),
            'readonly' => Yii::t('app', 'Readonly'),
            'mandatory_depends_on' => Yii::t('app', 'Mandatory depends on'),
            'readonly_depends_on' => Yii::t('app', 'Readonly depends on'),
            'default' => Yii::t('app', 'Default'),
            'description' => Yii::t('app', 'Description'),
            'in_filter' => Yii::t('app', 'In filter'),
            'print_hide' => Yii::t('app', 'Print hide'),
            'print_width' => Yii::t('app', 'Print width'),
            'width' => Yii::t('app', 'Width'),
        ];
    }

    public function afterFind ()
    {
        $this->actionType = self::ACTION_TYPE_UPDATE;
        $this->scenario = self::SCENARIO_BATCH_ACTION;
        return parent::afterFind();
    }

    // public function afterSave ( $insert, $changedAttributes ) {
    //     if ( !$insert ) {
    //         foreach ( $changedAttributes as $attribute) {
    //             if ($attribute == 'db_type' ) 
    //                 $this->changedDbColumn[$attribute] = self::COLUMN_CHANGE_TYPE;
    //         }
    //     }
    //     return parent::afterSave($insert, $changedAttributes);
    // }

    public static function dbColumnAttributes () {
        return [
            // 'field_name',
            'db_type',
            'unique',
            'mandatory',
            'default',
            'length'
        ];
    }

    public static function dbColumnAttributeConstraints () {
        return [
            'primaryKey' => ' PRIMARY KEY',
            'unique' => ' UNIQUE',
            'mandatory' => ' NOT NULL',
        ];
    }

}
