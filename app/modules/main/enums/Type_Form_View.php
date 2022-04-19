<?php

namespace crudle\main\enums;

use Yii;

class Type_Form_View
{
    const MultiModal= 'MultiModal';
    const Multiple  = 'Multiple';
    const Single    = 'Single';
    const Inline    = 'Inline';
    const Modal     = 'Modal';

    public static function enums()
    {
        return [
            self::MultiModal,
            self::Multiple,
            self::Single,
            self::Inline,
            self::Modal,
        ];
    }
}