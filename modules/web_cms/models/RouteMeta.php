<?php

namespace crudle\ext\web_cms\models;

use crudle\app\main\models\ActiveRecord;

class RouteMeta extends ActiveRecord
{
    public static function tableName()
    {
        return 'site_route_meta';
    }

    public function rules()
    {
        return [
            [['route_url'], 'required'],
            [['inactive'], 'boolean'],
        ];
    }
}
