<?php

namespace app\modules\main\enums;

use Yii;

class Rule_Scenario
{
    const Create    = 'create';
    const Read      = 'read';
    const Update    = 'update';
    const Delete    = 'delete';
    const Tabular   = 'tabular'; // Batch, Table, Multiline

    public static function enums()
    {
        return [
            self::Create    => Yii::t('app', self::Create),
            self::Read      => Yii::t('app', self::Read),
            self::Update    => Yii::t('app', self::Update),
            self::Delete    => Yii::t('app', self::Delete),
            self::Tabular   => Yii::t('app', self::Tabular),
        ];
    }
}