<?php

namespace crudle\ext\cms\models;

use crudle\app\setup\models\base\BaseSettingsForm;
use Yii;

class WebsiteScriptForm extends BaseSettingsForm
{
    public $custom_js;
    public $inactive;

    public function rules()
    {
        return [
            [['custom_js'], 'string'],
            [['inactive'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'custom_js' => Yii::t('app', 'Custom JS'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
