<?php

namespace crudle\setup\models;

use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class PrinterSettingsForm extends BaseSettingsForm
{
    public $name;
    public $serverIP = 'localhost';
    public $port = 631;
    public $printerName;

    public function init()
    {
        // load printer list
    }

    public function rules()
    {
        return [
            [[
                'name',
                'serverIP',
                'port',
                'printerName',
            ], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'   =>  Yii::t('app', 'Name'),
            'serverIP'   =>  Yii::t('app', 'Server IP'),
            'port' =>  Yii::t('app', 'Port'),
            'printerName' =>  Yii::t('app', 'Printer name'),
        ];
    }
}
