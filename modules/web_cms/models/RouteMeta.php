<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\models\ActiveRecord;

class RouteMeta extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Site_Route_Meta}}';
    }

    public function rules()
    {
        return [
            [['route_url'], 'required'],
            [['inactive'], 'boolean'],
        ];
    }
}
