<?php

namespace crudle\setup\enums;

use Yii;

class Type_Menu_Group
{
    const Printing = 'Printing';
    const Email = 'Email';
    const Data = 'Data';
    const People = 'People';
    const Core = 'Core';
    const Layout = 'Layout';
    const MasterData = 'Master Data';
    const Reports = 'Reports';
    const Settings = 'Settings';
    const Transactions = 'Transactions';


    public static function enums()
    {
        return [
            self::Printing => Yii::t('app', 'Printing'),
            self::Email => Yii::t('app', 'Email Sending'),
            self::Data => Yii::t('app', 'Data Tool'),
            self::People => Yii::t('app', 'People'),
            self::Core => Yii::t('app', 'System'),
            self::Layout => Yii::t('app', 'Workspace'),
            self::MasterData => Yii::t('app', 'Master Data'),
            self::Reports => Yii::t('app', 'Reports'),
            self::Transactions => Yii::t('app', 'Transactions'),
            self::Settings => Yii::t('app', 'Settings'),
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
            self::MasterData => 'file outline',
            self::Reports => 'line chart',
            self::Transactions => 'copy outline',
            self::Settings => 'cogs',
        ];
    }
}