<?php

namespace crudle\app\main\enums;

use crudle\app\main\enums\Type_Menu_Group;
use Yii;
use yii\helpers\ArrayHelper;

class Type_Menu_Sub_Group extends Type_Menu_Group
{
    const Dashboard = 'Dashboard';
    const Workspace = 'Workspace';


    public static function enums()
    {
        return 
            ArrayHelper::merge([
                self::Dashboard => Yii::t('app', 'Dashboard'),
                self::Workspace => Yii::t('app', 'Workspace'),
            ], parent::enums());
    }

    public static function enumIcons()
    {
        return 
            ArrayHelper::merge([
                self::Dashboard => 'window',
                self::Workspace => 'window',
            ], parent::enumIcons());
    }
}