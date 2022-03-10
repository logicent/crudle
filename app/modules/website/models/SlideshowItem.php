<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecordDetail;

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
