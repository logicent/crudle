<?php

namespace crudle\setup\enums;

use crudle\main\enums\Type_Menu_Group;
use Yii;
use yii\helpers\ArrayHelper;

class Type_Menu_Sub_Group
{
    const Printing = 'Printing';
    const Email = 'Email';
    const Data = 'Data';
    const People = 'People';
    const Core = 'Core';
    const Code = 'Code';
    const Layout = 'Layout';


    public static function enums()
    {
    return 
            ArrayHelper::merge([
                self::Printing => Yii::t('app', 'Printing'),
                self::Email => Yii::t('app', 'Email Sending'),
                self::Data => Yii::t('app', 'Data Tool'),
                self::People => Yii::t('app', 'People'),
                self::Core => Yii::t('app', 'System'),
                self::Code => Yii::t('app', 'Code Generator'),
                self::Layout => Yii::t('app', 'Workspace'),
            ], Type_Menu_Group::enums());
    }

    public static function enumIcons()
    {
        return 
            ArrayHelper::merge([
                self::Printing => 'print',
                self::Email => 'inbox',
                self::Data => 'server', // 'disk',
                self::People => 'users',
                self::Core => 'cog', // 'toggle on'
                self::Code => 'code',
                self::Layout => 'window maximize outline',
            ], Type_Menu_Group::enumIcons());
    }
}