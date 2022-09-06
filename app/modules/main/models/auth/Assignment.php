<?php

namespace crudle\app\main\models\auth;

use Yii;

/**
 * This is the model class for table "auth_assignment".
 */
class Assignment extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%Auth_Assignment}}';
    }

    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'item_name' => Yii::t('app', 'Item Name'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
