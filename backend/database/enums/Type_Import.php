<?php

namespace crudle\app\database\enums;

use Yii;

class Type_Import
{
    const CreateRecords = 'create_records';
    const UpdateRecords = 'update_records';

    public static function enums()
    {
        return [
            self::CreateRecords => Yii::t('app', 'Add new records'),
            self::UpdateRecords => Yii::t('app', 'Update existing records'),
        ];
    }
}