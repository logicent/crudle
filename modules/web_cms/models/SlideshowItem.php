<?php

namespace crudle\ext\web_cms\models;

use crudle\app\main\models\ActiveRecordDetail;

class SlideshowItem extends ActiveRecordDetail
{
    public static function tableName()
    {
        return 'site_slideshow_item';
    }

    public function rules()
    {
        return [
            [['image', 'heading', 'description', 'url'], 'string'],
            [['published'], 'boolean'],
        ];
    }
}
