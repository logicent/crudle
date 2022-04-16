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
            self::Email => Yii::t('app', 'Email Sending'),
            self::Data => Yii::t('app', 'Data Tool'),
            self::People => Yii::t('app', 'People'),
            self::Core => Yii::t('app', 'System'),
            self::Layout => Yii::t('app', 'Workspace'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Printing => 'print',
            self::Email => 'inbox',
            self::Data => 'server', // 'disk',
            self::People => 'users',
            self::Core => 'cog', // 'toggle on'
            self::Layout => 'window maximize outline',
        ];
    }
}