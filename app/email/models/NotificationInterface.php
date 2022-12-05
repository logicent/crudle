<?php

namespace crudle\app\main\models\base;

interface NotificationInterface
{
    public static function sendTo();
    public static function ccIds();
    public static function includeAttributes();
}