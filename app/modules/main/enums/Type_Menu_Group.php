<?php

namespace crudle\main\enums;

use Yii;


class Type_Menu_Group
{
    const MasterData = 'Master Data';
    const Reports = 'Reports';
    const Transactions = 'Transactions';
    const Settings = 'Settings';


    public static function enums()
    {
        return [
            self::MasterData => Yii::t('app', 'Master Data'),
            self::Reports => Yii::t('app', 'Reports'),
            self::Transactions => Yii::t('app', 'Transactions'),
            self::Settings => Yii::t('app', 'Settings'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::MasterData => 'file outline',
            self::Reports => 'line chart',
            self::Transactions => 'copy outline',
            self::Settings => 'cogs',
        ];
    }
}