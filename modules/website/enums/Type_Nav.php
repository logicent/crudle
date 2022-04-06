<?php

namespace website\enums;

use Yii;

class Type_Nav
{
    const Header = 'header';
    const Footer = 'footer';

    public function enums()
    {
        return [
            self::Header => Yii::t('app', 'Header'),
            self::Footer => Yii::t('app', 'Footer'),
        ];
    }
}