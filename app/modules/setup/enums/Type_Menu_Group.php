<?php

namespace app\modules\setup\enums;

use Yii;

class Type_Menu_Group
{
    const Printing = 'Printing';
    const Email = 'Email';
    const Data = 'Data';
    const People = 'People';
    const Core = 'Core';

    public static function enums()
    {
        return [
            self::Printing => Yii::t('app', 'Printing'),
            self::Email => Yii::t('app', 'Email'),
            self::Data => Yii::t('app', 'Data'),
            self::People => Yii::t('app', 'People'),
            self::Core => Yii::t('app', 'Core'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Printing => 'print',
            self::Email => 'mail outline',
            self::Data => 'server',
            self::People => 'users',
            self::Core => 'toggle on',
        ];
    }
}