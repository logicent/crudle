<?php

namespace app\enums;

use Yii;

class Type_Report
{
    const List   = 'List';
    const Summary    = 'Summary';
    const List_with_Summary    = 'List with Summary';

    public static function enums()
    {
        return [
            self::List   => Yii::t('app', 'List'),
            self::Summary    => Yii::t('app', 'Summary'),
            self::List_with_Summary  => Yii::t('app', 'List & Summary'),
        ];
    }
}