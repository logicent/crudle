<?php

namespace crudle\app\main\enums;

use Yii;
use yii\db\Schema;
use yii\helpers\ArrayHelper;

class Type_Field
{
    const TextInput = 'text';
    const DateInput = 'date';
    const TimeInput = 'time';
    const DateTimeInput = 'datetime';
    const DateRange = 'daterange';
    const Checkbox = 'checkbox';
    const CheckboxList = 'checkboxList';
    const Radio = 'radio';
    const RadioList = 'radioList';
    const Select = 'select';
    const Dropdown = 'dropdown';
    const Textarea = 'textarea';
    const TextEditor = 'textEditor';

    const Table = 'table';
    const Image = 'image';
    const Button = 'button';
    // const Heading = 'heading';
    // const Signature = 'signature';
    const ColumnBreak = 'column_break';
    const SectionBreak = 'section_break';


    public static function enums()
    {
        return [
            self::TextInput => Yii::t('app', 'Text'),
            self::DateInput => Yii::t('app', 'Date'),
            self::TimeInput => Yii::t('app', 'Time'),
            self::DateTimeInput => Yii::t('app', 'Date time'),
            self::DateRange => Yii::t('app', 'Date range'),
            self::Checkbox => Yii::t('app', 'Checkbox'),
            self::CheckboxList => Yii::t('app', 'Checkbox list'),
            self::Radio => Yii::t('app', 'Radio'),
            self::RadioList => Yii::t('app', 'Radio list'),
            self::Select => Yii::t('app', 'Select'),
            self::Dropdown => Yii::t('app', 'Dropdown'),
            self::Textarea => Yii::t('app', 'Text box'),
            self::TextEditor => Yii::t('app', 'Text editor'),
            self::Table => Yii::t('app', 'Table'),
            self::Image => Yii::t('app', 'Image'),
            self::Button => Yii::t('app', 'Button'),
            self::ColumnBreak => Yii::t('app', 'Column break'),
            self::SectionBreak => Yii::t('app', 'Section break'),
        ];
    }

    public static function dbTypes()
    {
        return [
            self::TextInput => Schema::TYPE_STRING,
            self::DateInput => Schema::TYPE_DATE,
            self::TimeInput => Schema::TYPE_TIME,
            self::DateTimeInput => Schema::TYPE_DATETIME,
            self::DateRange => Schema::TYPE_STRING,
            self::Checkbox => Schema::TYPE_TINYINT,
            self::CheckboxList => Schema::TYPE_STRING,
            self::Radio => Schema::TYPE_TINYINT,
            self::RadioList => Schema::TYPE_STRING,
            self::Select => Schema::TYPE_STRING,
            self::Dropdown => Schema::TYPE_STRING,
            self::Textarea => Schema::TYPE_TEXT,
            self::TextEditor => Schema::TYPE_TEXT,
        ];
    }
}
