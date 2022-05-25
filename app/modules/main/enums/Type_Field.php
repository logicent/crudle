<?php

namespace crudle\app\main\enums;

use yii\db\Schema;

class Type_Field
{
    const Attach = 'Attach';
    const AttachImage = 'Attach Image';

    const Barcode = 'Barcode';
    const Button = 'Button';
    const Check = 'Check';
    const Code = 'Code';
    const Color = 'Color';
    const Currency = 'Currency';
    const Data = 'Data';
    const Date = 'Date';
    const Datetime = 'Datetime';
    const Time = 'Time';

    const Link = 'Link';
    const DynamicLink = 'Dynamic Link';
    const Image = 'Image';
    const Number = 'Int';
    const RealNumber = 'Float';
    const LongText = 'Long Text';
    const Password = 'Password';
    const Percent = 'Percent';
    const Rating = 'Rating';
    const ReadOnly = 'Read Only';

    const Geolocation = 'Geolocation';
    const Heading = 'Heading';
    const HTML = 'HTML';
    const HTMLEditor = 'HTML Editor';
    const Fold = 'Fold';
    const ColumnBreak = 'Column Break';
    const SectionBreak = 'Section Break';
    const MarkdownEditor = 'Markdown Editor';
    const TextEditor = 'Text Editor';
    const Select = 'Select';
    const Signature = 'Signature';
    const SmallText = 'Small Text';
    const Table = 'Table';
    const TableMultiSelect = 'Table MultiSelect';
    const Text = 'Text';

    public static function enums()
    {
        return [

        ];
    }

    public static function dbTypes()
    {
        return [
            self::Attach => Schema::TYPE_STRING,
            self::AttachImage => Schema::TYPE_STRING,
            self::Barcode => Schema::TYPE_STRING,
            self::Check => Schema::TYPE_TINYINT,
            self::Code => Schema::TYPE_STRING,
            self::Color => Schema::TYPE_STRING,
            self::Currency => Schema::TYPE_MONEY,
            self::Data => Schema::TYPE_STRING,
            self::Date => Schema::TYPE_DATE,
            self::Datetime => Schema::TYPE_DATETIME,
            self::Number => Schema::TYPE_INTEGER,
            self::Geolocation => Schema::TYPE_JSON,
            self::Heading => Schema::TYPE_STRING,
            self::HTML => Schema::TYPE_TEXT,
            self::HTMLEditor => Schema::TYPE_TEXT,
            self::Image => Schema::TYPE_STRING,
            self::RealNumber => Schema::TYPE_DECIMAL,
            self::Link => Schema::TYPE_STRING,
            self::LongText => Schema::TYPE_TEXT,
            self::MarkdownEditor => Schema::TYPE_TEXT,
            self::Password => Schema::TYPE_STRING,
            self::Percent => Schema::TYPE_DOUBLE,
            self::Rating => Schema::TYPE_STRING,
            self::ReadOnly => Schema::TYPE_BOOLEAN,
            self::Select => Schema::TYPE_STRING,
            self::Signature => Schema::TYPE_TEXT,
            self::SmallText => Schema::TYPE_TEXT,
            self::Table => Schema::TYPE_JSON,
            self::TableMultiSelect => Schema::TYPE_JSON,
            self::Text => Schema::TYPE_TEXT,
            self::TextEditor => Schema::TYPE_TEXT,
            self::Time => Schema::TYPE_TIME
        ];
    }
}
