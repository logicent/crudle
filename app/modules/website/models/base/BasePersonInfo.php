<?php

namespace app\modules\website\models\base;

use app\models\base\BaseActiveRecordDetail;
use Yii;

class BasePersonInfo extends BaseActiveRecordDetail
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