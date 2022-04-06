<?php

namespace app\modules\main\models\auth;

use Yii;

/**
 * This is the model class for table "auth_item_child".
 */
class ItemChild extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'auth_item_child';
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
