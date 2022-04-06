<?php

namespace website\models;

use app\modules\main\models\base\BaseActiveRecordDetail;

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
