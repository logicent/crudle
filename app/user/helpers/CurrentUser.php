<?php

namespace crudle\app\helpers;

use Yii;

class CurrentUser
{
    public static function can( $permission )
    {
        return Yii::$app->user->can( $permission );
    }
}