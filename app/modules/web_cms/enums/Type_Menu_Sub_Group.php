<?php

namespace crudle\app\web_cms\enums;

use crudle\app\main\enums\Type_Menu_Group;
use Yii;
use yii\helpers\ArrayHelper;

class Type_Menu_Sub_Group extends Type_Menu_Group
{
    const Setup = 'Setup';
    const Blog = 'Blog';
    const Content = 'Content';

    public static function enums()
    {
        return
            ArrayHelper::merge([
                self::Setup => Yii::t('app', 'Setup'),
                self::Blog => Yii::t('app', 'Blog'),
                self::Content => Yii::t('app', 'Content'),
            ], parent::enums());
    }

    public static function enumIcons()
    {
        return
            ArrayHelper::merge([
                self::Setup => 'cogs', // 'options'
                self::Blog => 'edit', // outline
                self::Content => 'file alternate outline', // 'copy outline',
            ], parent::enumIcons());
    }
}