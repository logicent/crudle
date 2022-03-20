<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecord;

class Slideshow extends BaseActiveRecord
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
