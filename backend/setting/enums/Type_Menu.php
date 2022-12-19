<?php

namespace crudle\app\setting\enums;

use Yii;

class Type_Menu
{
    const Shortcut = 'Shortcut';
    const Create = 'Create';
    const Help = 'Help';
    const User = 'User';
    const Alert = 'Alert';
    const Sidebar = 'Sidebar';

    public static function enums()
    {
        return [
            self::Shortcut => Yii::t('app', 'Shortcut menu'),
            self::Create => Yii::t('app', 'Create menu'),
            self::Help => Yii::t('app', 'Help menu'),
            self::User => Yii::t('app', 'User menu'),
            self::Alert => Yii::t('app', 'Alert menu'),
            self::Sidebar => Yii::t('app', 'Sidebar menu'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Shortcut => 'link',
            self::Create => 'plus',
            self::Help => 'help',
            self::User => 'user',
            self::Alert => 'alert',
            self::Sidebar => 'layout',
        ];
    }
}