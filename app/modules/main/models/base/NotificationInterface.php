<?php

namespace app\modules\main\models\base;

interface NotificationInterface
{
    public static function sendTo();
    public static function ccIds();
    public static function includeAttributes();
}