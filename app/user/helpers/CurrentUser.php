<?php

namespace crudle\app\user\helpers;

use Yii;

class CurrentUser
{
    public static function can( $permission )
    {
        return Yii::$app->user->can( $permission );
    }
}