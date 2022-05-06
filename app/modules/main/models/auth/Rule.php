<?php

namespace crudle\app\main\models\auth;

use Yii;

/**
 * This is the model class for table "auth_rule".
 */
class Rule extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'auth_rule';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
