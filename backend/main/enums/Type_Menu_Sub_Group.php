<?php

namespace crudle\app\main\enums;

use Yii;
use yii\helpers\ArrayHelper;

class Type_Menu_Sub_Group
{
    const Dashboard = 'Dashboard';
    const Workspace = 'Workspace';
    const Module = 'Module';

    public static function enums()
    {
        return [
            self::Dashboard => Yii::t('app', 'Dashboard'),
            self::Workspace => Yii::t('app', 'Workspace'),
            self::Module => Yii::t('app', 'Module')
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Dashboard => 'dashboard',
            self::Workspace => 'windows outline',
            self::Module => 'columns'
        ];
    }
}