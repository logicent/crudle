<?php

namespace crudle\app\crud\enums;

use Yii;

class Type_Comment
{
    const UserNote = 'Note'; // user-entered message or note
    const UserTask = 'Task'; // e.g. Send Email
    const Timestamp = 'Stamp'; // e.g Created this, Approved this i.e. user (CRUD) action
    const ChangeLog = 'ChgLog'; // track value changes in fields
    const ErrorMessage = 'ErrMsg'; // e.g. Send Email

    public static function enums()
    {
        return [
            self::UserNote  => Yii::t('app', 'User note'),
            self::UserTask  => Yii::t('app', 'User task'),
            self::Timestamp => Yii::t('app', 'Time stamp'),
            self::ChangeLog  => Yii::t('app', 'Change log'),
            self::ErrorMessage  => Yii::t('app', 'Error message'),
        ];
    }
}