<?php

namespace crudle\app\web_cms\models;

use crudle\app\main\models\ActiveRecord;

class Slideshow extends ActiveRecord
{
    public static function tableName()
    {
        return 'site_slide';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['header'], 'string'],
            [['published', 'full_width'], 'boolean'],
        ];
    }
}
