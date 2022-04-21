<?php

namespace crudle\setup\models;

use crudle\setup\enums\Type_Permission;
use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class DbBackupSettingsForm extends BaseSettingsForm
{
    public $includeTables =[];
    public $excludeTables = [];
    public $hiddenColumns = [];
    public $file;
    public $useCompression = true;
    public $comments;
    public $keepBackupsFor;

    public function rules()
    {
        return [
            [['keepBackupsFor'], 'required'],
            [['useCompression'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'useCompression' => Yii::t('app', 'Use compression'),
            'keepBackupsFor' => Yii::t('app', 'Keep backups for'),
        ];
    }

    public static function permissions()
    {
        return [
            Type_Permission::Create => Type_Permission::Create,
            Type_Permission::Delete => Type_Permission::Delete,
            Type_Permission::List => Type_Permission::List
        ];
    }
}
