<?php

namespace crudle\app\web_cms\models;

use crudle\app\main\models\ActiveRecordDetail;

class RouteMetaTag extends ActiveRecordDetail
{
    public static function tableName()
    {
        return 'site_route_meta';
    }

    public function rules()
    {
        return [
            [['key', 'value'], 'string'],
        ];
    }
}
