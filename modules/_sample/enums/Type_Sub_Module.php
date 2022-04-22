<?php

namespace _sample\enums;

use Yii;

class Type_Sub_Module
{
    const Sub_Module = 'Sub Module';

    public static function enums()
    {
        return [
            self::Sub_Module => Yii::t('app', 'Sub Module'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Sub_Module => 'options',
        ];
    }
}