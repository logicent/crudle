<?php

namespace crudle\app\main\enums;

use Yii;
use yii\db\Schema;
use yii\helpers\ArrayHelper;

class Type_Field_Input extends Type_Field
{
    const Alphanumeric = 'alpha';
    const WholeNumber = 'whole';
    const FloatNumber = 'float';
    const Currency = 'money';
    const SmallText = 'text';
    const LargeText = 'text';
    const FileInput = 'file';
    const Code = 'code';
    const Color = 'color';
    const Password = 'password';
    const Percent = 'percent';
    const Rating = 'rating';
    const ReadOnly = 'readonly';
    const Geolocation = 'geolocation';
    const HtmlEditor = 'htmleditor';
    const MarkdownEditor = 'markdowneditor';
    const Link = 'link';
    const DynamicLink = 'dynamiclink';


    public static function enums()
    {
        return ArrayHelper::merge([
            self::Alphanumeric => Yii::t('app', 'Alpha-numeric'),
            self::WholeNumber => Yii::t('app', 'Whole number'),
            self::FloatNumber => Yii::t('app', 'Float number'),
            self::Currency => Yii::t('app', 'Currency'),
            self::SmallText => Yii::t('app', 'Small text'),
            self::LargeText => Yii::t('app', 'Large text'),
            self::FileInput => Yii::t('app', 'File input'),
            self::Code => Yii::t('app', 'Code'),
            self::Color => Yii::t('app', 'Color'),
            self::Password => Yii::t('app', 'Password'),
            self::Percent => Yii::t('app', 'Percent'),
            self::Rating => Yii::t('app', 'Rating'),
            self::ReadOnly => Yii::t('app', 'Read-only'),
            self::Geolocation => Yii::t('app', 'Geo-location'),
            self::HtmlEditor => Yii::t('app', 'HTML editor'),
            self::MarkdownEditor => Yii::t('app', 'Markdown editor'),
            self::Link => Yii::t('app', 'Link'),
            self::DynamicLink => Yii::t('app', 'Dynamic link'),
        ], parent::enums());
    }

    public static function dbTypes()
    {
        return ArrayHelper::merge([
            self::Alphanumeric => Schema::TYPE_STRING,
            self::WholeNumber => Schema::TYPE_INTEGER,
            self::FloatNumber => Schema::TYPE_DECIMAL,
            self::Currency => Schema::TYPE_DECIMAL,
            self::SmallText => Schema::TYPE_TEXT,
            self::LargeText => Schema::TYPE_TEXT,
            self::FileInput => Schema::TYPE_TEXT,
            self::Code =>  Schema::TYPE_STRING,
            self::Color =>  Schema::TYPE_STRING,
            self::Password =>  Schema::TYPE_STRING,
            self::Percent =>  Schema::TYPE_STRING,
            self::Rating =>  Schema::TYPE_STRING,
            self::ReadOnly =>  Schema::TYPE_STRING,
            self::Geolocation =>  Schema::TYPE_STRING,
            self::HtmlEditor =>  Schema::TYPE_TEXT,
            self::MarkdownEditor =>  Schema::TYPE_TEXT,
            self::Link =>  Schema::TYPE_STRING,
            self::DynamicLink =>  Schema::TYPE_STRING,
        ], parent::dbTypes());
    }
}
