<?php

namespace website\models;

use crudle\main\models\base\BaseActiveRecord;

class RouteMeta extends BaseActiveRecord
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
