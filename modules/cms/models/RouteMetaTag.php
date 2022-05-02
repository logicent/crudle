<?php

namespace logicent\cms\models;

use crudle\main\models\base\BaseActiveRecordDetail;

class RouteMetaTag extends BaseActiveRecordDetail
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
