<?php

namespace crudle\app\email\models;

interface NotificationInterface
{
    public static function sendTo();
    public static function ccIds();
    public static function includeAttributes();
}