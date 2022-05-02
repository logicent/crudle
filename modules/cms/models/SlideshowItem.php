<?php

namespace logicent\cms\models;

use crudle\main\models\base\BaseActiveRecordDetail;

class SlideshowItem extends BaseActiveRecordDetail
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
