<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecord;

class BlogCategory extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_post_category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['published'], 'boolean'],
            [['description', 'route'], 'string'],
        ];
    }
}
