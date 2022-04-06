<?php

namespace app\modules\setup\models;

use app\modules\main\models\base\BaseActiveRecordDetail;
use Yii;
use yii\db\Schema;

/**
 * This is the model class for table "data_model_field".
 */
class DataModelField extends BaseActiveRecordDetail
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
        return 'app_data_model_field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['actionType', 'required', 'on' => self::SCENARIO_BATCH_ACTION],
            ['actionType',
                'in',
                'range' => [self::ACTION_TYPE_CREATE, self::ACTION_TYPE_UPDATE, self::ACTION_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_ACTION
            ],
            ['data_model', 'required', 'except' => self::SCENARIO_BATCH_ACTION],
            [['name', 'label', 'type', 'data_model'], 'required'],
            [['length', 'mandatory', 'unique', 'in_list_view', 'in_standard_filter', 'in_global_search', 'bold', 'allow_in_quick_entry', 'translatable', 'fetch_from', 'fetch_if_empty', 'ignore_user_permissions', 'allow_on_submit', 'report_hide', 'perm_level', 'hidden', 'readonly', 'in_filter', 'print_hide', 'print_width', 'width'], 'integer'],
            [['options'], 'string'],
            [['name', 'data_model', 'label', 'type', 'depends_on', 'mandatory_depends_on', 'readonly_depends_on', 'default', 'description'], 'string', 'max' => 140],
            [['name', 'data_model'], 'unique', 'targetAttribute' => ['name', 'data_model']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'data_model' => Yii::t('app', 'Data Model'),
            'label' => Yii::t('app', 'Label'),
            'length' => Yii::t('app', 'Length'),
            'type' => Yii::t('app', 'Type'),
            'options' => Yii::t('app', 'Options'),
            'mandatory' => Yii::t('app', 'Mandatory'),
            'unique' => Yii::t('app', 'Unique'),
            'in_list_view' => Yii::t('app', 'In List View'),
            'in_standard_filter' => Yii::t('app', 'In Standard Filter'),
            'in_global_search' => Yii::t('app', 'In Global Search'),
            'bold' => Yii::t('app', 'Bold'),
            'allow_in_quick_entry' => Yii::t('app', 'Allow In Quick Entry'),
            'translatable' => Yii::t('app', 'Translatable'),
            'fetch_from' => Yii::t('app', 'Fetch From'),
            'fetch_if_empty' => Yii::t('app', 'Fetch If Empty'),
            'depends_on' => Yii::t('app', 'Depends On'),
            'ignore_user_permissions' => Yii::t('app', 'Ignore User Permissions'),
            'allow_on_submit' => Yii::t('app', 'Allow On Submit'),
            'report_hide' => Yii::t('app', 'Report Hide'),
            'perm_level' => Yii::t('app', 'Perm Level'),
            'hidden' => Yii::t('app', 'Hidden'),
            'readonly' => Yii::t('app', 'Readonly'),
            'mandatory_depends_on' => Yii::t('app', 'Mandatory Depends On'),
            'readonly_depends_on' => Yii::t('app', 'Readonly Depends On'),
            'default' => Yii::t('app', 'Default'),
            'description' => Yii::t('app', 'Description'),
            'in_filter' => Yii::t('app', 'In Filter'),
            'print_hide' => Yii::t('app', 'Print Hide'),
            'print_width' => Yii::t('app', 'Print Width'),
            'width' => Yii::t('app', 'Width'),
        ];
    }

    public function afterFind ()
    {
        $this->actionType = self::ACTION_TYPE_UPDATE;
        $this->scenario = self::SCENARIO_BATCH_ACTION;
        return parent::afterFind();
    }

    public static function getListOptions()
    {
        return [
            'Attach' => 'Attach',
            'Attach Image' => 'Attach Image',
            'Barcode' => 'Barcode',
            // 'Button' => // 'Button',
            'Check' => 'Check',
            'Code' => 'Code',
            'Color' => 'Color',
            // 'Column Break' => // 'Column Break',
            'Currency' => 'Currency',
            // 'Data' => // 'Data',
            'Date' => 'Date',
            'Datetime' => 'Datetime',
            // 'Dynamic Link' => // 'Dynamic Link',
            'Float' => 'Float',
            // 'Fold' => // 'Fold',
            'Geolocation' => 'Geolocation',
            'Heading' => 'Heading',
            'HTML' => 'HTML',
            // 'HTML Editor' => // 'HTML Editor',
            'Image' => 'Image',
            'Int' => 'Int',
            'Link' => 'Link',
            'Long Text' => 'Long Text',
            // 'Markdown Editor' => // 'Markdown Editor',
            'Password' => 'Password',
            'Percent' => 'Percent',
            'Rating' => 'Rating',
            // 'Read Only' => // 'Read Only',
            // 'Section Break' => // 'Section Break',
            // 'Select' => // 'Select',
            'Signature' => 'Signature',
            'Small Text' => 'Small Text',
            // 'Table' => // 'Table',
            // 'Table MultiSelect' => // 'Table MultiSelect',
            'Text' => 'Text',
            // 'Text Editor' => // 'Text Editor',
            'Time' => 'Time',
        ];
    }

    public static function getDbType()
    {
        return [
            'Attach' => Schema::TYPE_STRING,
            'Attach Image' => Schema::TYPE_STRING,
            'Barcode' => Schema::TYPE_STRING,
            // 'Button' => Schema::,
            'Check' => Schema::TYPE_TINYINT,
            'Code' => Schema::TYPE_STRING,
            'Color' => Schema::TYPE_STRING,
            // 'Column Break' => Schema::,
            'Currency' => Schema::TYPE_MONEY,
            'Data' => Schema::TYPE_STRING,
            'Date' => Schema::TYPE_DATE,
            'Datetime' => Schema::TYPE_DATETIME,
            // 'Dynamic Link' => Schema::,
            'Float' => Schema::TYPE_FLOAT,
            // 'Fold' => Schema::,
            'Geolocation' => Schema::TYPE_JSON,
            'Heading' => Schema::TYPE_STRING,
            'HTML' => Schema::TYPE_TEXT,
            // 'HTML Editor' => Schema::,
            'Image' => Schema::TYPE_STRING,
            'Int' => Schema::TYPE_INTEGER,
            'Link' => Schema::TYPE_STRING,
            'Long Text' => Schema::TYPE_TEXT,
            // 'Markdown Editor' => Schema::,
            // 'Password' => Schema::,
            'Percent' => Schema::TYPE_DOUBLE,
            // 'Rating' => Schema::,
            'Read Only' => Schema::TYPE_BOOLEAN,
            // 'Section Break' => Schema::,
            // 'Select' => Schema::,
            // 'Signature' => Schema::,
            'Small Text' => Schema::TYPE_TEXT,
            // 'Table' => Schema::,
            // 'Table MultiSelect' => Schema::,
            'Text' => Schema::TYPE_TEXT,
            // 'Text Editor' => Schema::,
            'Time' => Schema::TYPE_TIME,
        ];
    }

    // public function afterSave ( $insert, $changedAttributes ) {
    //         \yii\helpers\VarDumper::dump($changedAttributes); exit;
    //     if ( !$insert ) {
    //         foreach ( $changedAttributes as $attribute) {
    //             if ($attribute == 'type' ) 
    //                 $this->changedDbColumn[$attribute] = self::COLUMN_CHANGE_TYPE;
    //         }
    //     }
    //     return parent::afterSave($insert, $changedAttributes);
    // }

    public static function dbColumnAttributes () {
        return [
            // 'name',
            'type',
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
