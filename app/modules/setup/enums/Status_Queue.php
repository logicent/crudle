<?php

namespace app\modules\setup\enums;

class Status_Queue
{
    const NotSent   = 'Not Sent';
    const Sent      = 'Sent';
    const Error     = 'Error';

    const NotSentColor  = 'yellow';
    const SentColor     = 'green';
    const ErrorColor    = 'red';

    public static function enums()
    {
        return [
            self::NotSent   => self::NotSent,
            self::Sent      => self::Sent,
            self::Error     => self::Error,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::NotSent   => self::NotSentColor,
            self::Sent      => self::SentColor,
            self::Error     => self::ErrorColor,
        ];
    }    
}