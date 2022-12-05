<?php

namespace crudle\app\auth\models;

use Yii;

/**
 * This is the model class for table "auth_item_child".
 */
class ItemChild extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%Auth_Item_Child}}';
    }

    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('app', 'Parent'),
            'child' => Yii::t('app', 'Child'),
        ];
    }
}
