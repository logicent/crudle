<?php

namespace crudle\app\map\forms;

use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class MapEntryForm extends BaseSettingsForm
{
    public function rules()
    {
        return [
            [
            ], 'safe'
        ];
    }

    public function attributeLabels()
    {
        return [
        ];
    }
}
