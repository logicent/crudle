<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecord;

class Sidebar extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_sidebar';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['published', 'full_width', 'show_title'], 'boolean'],
        ];
    }
}
