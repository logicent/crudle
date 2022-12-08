<?php

namespace crudle\ext\web_cms\models;

use crudle\app\main\enums\Status_Active;
use crudle\app\crud\models\ActiveRecord;

class Slideshow extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Site_Slide}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['header'], 'string'],
            [['published', 'full_width'], 'boolean'],
        ];
    }

    public static function enums()
    {
        return [
            'status' => [
                'class' => Status_Active::class,
                'attribute' => 'inactive'
            ]
        ];
    }
}
