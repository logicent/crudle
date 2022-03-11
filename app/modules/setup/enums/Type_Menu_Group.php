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
    const Layout = 'Layout';

    public static function enums()
    {
        return [
            self::Printing => Yii::t('app', 'Printing'),
            self::Email => Yii::t('app', 'Email'),
            self::Data => Yii::t('app', 'Data'),
            self::People => Yii::t('app', 'People'),
            self::Core => Yii::t('app', 'Core'),
            self::Layout => Yii::t('app', 'Layout'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Printing => 'print',
            self::Email => 'inbox', // 'mail outline',
            self::Data => 'server', // 'disk outline',
            self::People => 'users',
            self::Core => 'toggle on',
            self::Layout => 'window maximize outline',
        ];
    }
}