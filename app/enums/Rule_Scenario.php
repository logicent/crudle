<?php

namespace app\enums;

class Rule_Scenario
{
    const Create    = 'Create';
    const Read      = 'Read';
    const Update    = 'Update';
    const Delete    = 'Delete';
    const Tabular   = 'Tabular'; // Batch, Table, Multiline

    public static function enums()
    {
        return [
            self::Create    => self::Create,
            self::Read      => self::Read,
            self::Update    => self::Update,
            self::Delete    => self::Delete,
            self::Tabular   => self::Tabular,
        ];
    }
}