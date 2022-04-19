<?php

namespace website\models;

use crudle\setup\models\base\BaseSettingsForm;
use Yii;

class ThemeForm extends BaseSettingsForm
{
    public $theme_name;
    public $theme_font;
    public $font_size;
    public $primary_color;
    public $secondary_color;
    public $text_color;
    public $light_color;
    public $dark_color;
    public $background_color;
    public $full_width;
    public $custom_css;
    public $custom_js;

    public function rules()
    {
        return [
            [[
                'theme_name',
                'theme_font',
                'font',
                'font_size',
                'primary_color',
                'secondary_color',
                'text_color',
                'light_color',
                'dark_color',
                'background_color',
                'custom_css',
                'custom_js'
            ], 'string'],
            ['full_width', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'theme_name' => Yii::t('app', 'Theme name'),
            'theme_font' => Yii::t('app', 'Theme font'),
            'font' => Yii::t('app', 'Font'),
            'font_size'  => Yii::t('app', 'Font size'),
            'primary_color'  => Yii::t('app', 'Primary color'),
            'secondary_color'  => Yii::t('app', 'Secondary color'),
            'text_color'  => Yii::t('app', 'Text color'),
            'light_color'  => Yii::t('app', 'Light color'),
            'dark_color'  => Yii::t('app', 'Dark color'),
            'background_color'  => Yii::t('app', 'Background color'),
            'custom_css'  => Yii::t('app', 'Custom CSS'),
            'custom_js'  => Yii::t('app', 'Custom JS'),
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }
}
