<?php

namespace app\enums;

class Resource_Action
{
    const Create = 'create';
    const Read   = 'read';
    const Update = 'update';
    const Delete = 'delete';

    public static function enums()
    {
        return [
            self::Create => self::Create,
            self::Read   => self::Read,
            self::Update => self::Update,
            self::Delete => self::Delete,
        ];
    }
}