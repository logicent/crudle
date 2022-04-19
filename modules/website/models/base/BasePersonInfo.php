<?php

namespace website\models\base;

use crudle\main\models\base\BaseActiveRecord;
use Yii;

class BasePersonInfo extends BaseActiveRecord
{
    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['inactive'], 'boolean'],
            [['full_name', 'designation', 'image_link', 'bio'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'full_name' => Yii::t('app', 'Full name'),
            'designation' => Yii::t('app', 'Designation'),
            'image_link' => Yii::t('app', 'Image link'),
            'bio' => Yii::t('app', 'Bio'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }
}
