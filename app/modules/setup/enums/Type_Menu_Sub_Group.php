<?php

namespace crudle\app\setup\enums;

use crudle\app\main\enums\Type_Menu_Group;
use Yii;
use yii\helpers\ArrayHelper;

class Type_Menu_Sub_Group extends Type_Menu_Group
{
    const Code = 'Code';
    const System = 'System';
    const Tool = 'Tool';
    const Email = 'Email';
    const Layout = 'Layout';
    const People = 'People';
    const Printing = 'Printing';
    const Storage = 'Storage';


    public static function enums()
    {
        return 
            ArrayHelper::merge([
                self::Printing => Yii::t('app', 'Printing'),
                self::Email => Yii::t('app', 'Email Sending'),
                self::Tool => Yii::t('app', 'Data Tool'),
                self::People => Yii::t('app', 'People'),
                self::System => Yii::t('app', 'System'),
                self::Code => Yii::t('app', 'Code Generator'),
                self::Layout => Yii::t('app', 'Workspace'),
                self::Storage => Yii::t('app', 'Data Storage'),
            ], parent::enums());
    }

    public static function enumIcons()
    {
        return 
            ArrayHelper::merge([
                self::Printing => 'print',
                self::Email => 'inbox',
                self::Tool => 'server',
                self::People => 'users',
                self::Code => 'code',
                self::System => 'cog', // 'toggle on'
                self::Layout => 'window maximize outline',
                self::Storage => 'disk',
            ], parent::enumIcons());
    }
}