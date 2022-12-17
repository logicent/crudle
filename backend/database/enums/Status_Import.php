<?php

namespace crudle\app\database\enums;

class Status_Import
{
    const NotStarted    = 'Not Started';
    const InProgress    = 'In Progress';
    const Completed     = 'Completed';
    const Canceled      = 'Canceled';

    const NotStartedColor   = 'orange';
    const InProgressColor   = 'yellow';
    const CompletedColor    = 'green';
    const CanceledColor     = 'red';

    public static function enums()
    {
        return [
            self::NotStarted   => self::NotStarted,
            self::InProgress   => self::InProgress,
            self::Completed    => self::Completed,
            self::Canceled     => self::Canceled,
        ];
    }

    public static function enumsColor()
    {
        return [
            self::NotStarted   => self::NotStartedColor,
            self::InProgress   => self::InProgressColor,
            self::Completed    => self::CompletedColor,
            self::Canceled     => self::CanceledColor,
        ];
    }    
}