<?php

namespace crudle\ext\cms\enums;

use Yii;

class Type_Menu_Sub_Group
{
    const Setup = 'Setup';
    const Blog = 'Blog';
    const Content = 'Content';

    public static function enums()
    {
        return [
            self::Setup => Yii::t('app', 'Setup'),
            self::Blog => Yii::t('app', 'Blog'),
            self::Content => Yii::t('app', 'Content'),
        ];
    }

    public static function enumIcons()
    {
        return [
            self::Setup => 'cogs', // 'options'
            self::Blog => 'edit', // outline
            self::Content => 'file alternate outline', // 'copy outline',
        ];
    }
}