<?php

namespace crudle\app\crud\enums;

use crudle\app\main\enums\Type_Menu_Sub_Group;
use Yii;


class Type_Menu_Group extends Type_Menu_Sub_Group
{
    const MasterData = 'Master Data';
    const Reports = 'Reports';
    const Transactions = 'Transactions';
    const Settings = 'Settings';


    public static function enums()
    {
        return array_merge([
            self::MasterData => Yii::t('app', 'Master Data'),
            self::Reports => Yii::t('app', 'Reports'),
            self::Transactions => Yii::t('app', 'Transactions'),
            self::Settings => Yii::t('app', 'Settings'),
        ], parent::enums());
    }

    public static function enumIcons()
    {
        return array_merge([
            self::MasterData => 'file outline',
            self::Reports => 'line chart',
            self::Transactions => 'copy outline',
            self::Settings => 'cogs',
        ], parent::enums());
    }
}