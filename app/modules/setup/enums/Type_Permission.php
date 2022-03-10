<?php

namespace app\modules\setup\enums;

class Type_Permission
{
    // Basic CRUD operations
    const Create = 'Create'; // and Duplicate
    const List   = 'List';
    const Read   = 'Read';
    const Update = 'Update'; // Write
    const Delete  = 'Delete';
    const Restore = 'Restore'; // Use if Soft Delete is supported or if restoring data dumps
    // Work flow operations
    const Submit = 'Submit';
    const Cancel = 'Cancel';
    const Amend  = 'Amend';
    // Data operations
    const Export = 'Export'; // Download ?
    const Import = 'Import';
    const Print  = 'Print';
    const Share  = 'Share';
    const Email  = 'Email';

    public static function enums( $group = Permission_Group::All )
    {
        switch ( $group )
        {
            case Permission_Group::Crud:
                return self::_crudEnums();

            case Permission_Group::Data:
                return self::_dataEnums();

            case Permission_Group::Flow:
                return self::_flowEnums();

            default: // self::All
                return array_merge(
                        self::_crudEnums(),
                        self::_dataEnums(),
                        self::_flowEnums(),
                    );
        }
    }

    private static function _crudEnums()
    {
        return [
            self::Create => self::Create,
            self::List   => self::List,
            self::Read   => self::Read,
            self::Update => self::Update,
            self::Delete => self::Delete,
        ];
    }

    private static function _dataEnums()
    {
        return [
            self::Export => self::Export,
            self::Import => self::Import,
            self::Print => self::Print,
            self::Share => self::Share,
            self::Email => self::Email,
        ];
    }

    private static function _flowEnums()
    {
        return [
            self::Submit => self::Submit,
            self::Cancel => self::Cancel,
            self::Amend  => self::Amend,
        ];
    }
}