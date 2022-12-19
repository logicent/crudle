<?php

namespace crudle\app\listing\forms;

use crudle\app\setting\models\base\BaseSettingsForm;
use Yii;

class CalendarEntryForm extends BaseSettingsForm
{
    public $eventName;

    public function rules()
    {
        return [
            [
                'eventName'
            ], 'safe'
        ];
    }

    public function attributeLabels()
    {
        return [
            'eventName' => Yii::t('app', 'Event name'),
        ];
    }
}
