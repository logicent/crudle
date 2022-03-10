<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecord;

class Slideshow extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_slideshow';
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
