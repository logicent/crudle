<?php

namespace website\models;

use app\modules\main\models\base\BaseActiveRecord;

class WebForm extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_form';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['published', 'full_width', 'show_title'], 'boolean'],
        ];
    }
}
