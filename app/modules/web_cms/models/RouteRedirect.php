<?php

namespace crudle\app\web_cms\models;

use crudle\app\main\models\ActiveRecord;

class RouteRedirect extends ActiveRecord
{
    public static function tableName()
    {
        return 'site_redirect';
    }

    public function rules()
    {
        return [
            [['source_url', 'target_url'], 'required'],
            [['inactive'], 'boolean'],
            [['source_url', 'target_url'], 'string'],
        ];
    }
}
