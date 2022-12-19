<?php

namespace crudle\app\setting\enums;

use Yii;

class Type_Column
{
    const Left  = 'Lft';
    const Middle   = 'Mid';
    const Right  = 'Rgt';

    public static function enums()
    {
        return [
            self::Left  => Yii::t('app', 'Left'),
            self::Middle   => Yii::t('app', 'Middle'),
            self::Right  => Yii::t('app', 'Right'),
        ];
    }
}