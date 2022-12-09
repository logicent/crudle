<?php

namespace crudle\app\user\enums;

class Type_Permission
{
    // Work flow operations
    const Duplicate = 'Create';
    const UpdateStatus = 'Update Status';
    const Submit = 'Submit';
    const Cancel = 'Cancel';
    const Amend  = 'Amend';

    public static function enums()
    {
        return [
            self::Duplicate => self::Duplicate,
            self::UpdateStatus => self::UpdateStatus,
            self::Submit => self::Submit,
            self::Cancel => self::Cancel,
            self::Amend  => self::Amend,
        ];
    }
}