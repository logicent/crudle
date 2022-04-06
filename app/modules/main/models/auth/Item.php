<?php

namespace app\modules\main\models\auth;

use app\modules\main\models\base\BaseActiveRecord;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "auth_item".
 */
class Item extends BaseActiveRecord
{
    const TYPE_ROLE = 1;
    const TYPE_PERMISSION = 2;

    public static function tableName()
    {
        return 'auth_item';
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function ($event) {
                    return new \yii\db\Expression('UNIX_TIMESTAMP()');
                },
            ]
        ];
    }

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            // [['name'], 'trim'], // TODO: Check if this messes up existing assignments
            ['name', 'unique', 'message' => Yii::t('app', 'This role already exists') ],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'rule_name' => Yii::t('app', 'Rule Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert))
            return false;

        return true;
    }

}
