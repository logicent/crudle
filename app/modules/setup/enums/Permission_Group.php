<?php

namespace crudle\setup\enums;

class Permission_Group
{
    const All  = 'All';
    const Crud = 'Crud'; // Basic
    const Data = 'Data'; // Admin
    const Flow = 'Flow';

    public static function enums()
    {
        return [
            self::All  => self::All,
            self::Crud => self::Crud,
            self::Data => self::Data,
            self::Flow => self::Flow,
        ];
    }
}