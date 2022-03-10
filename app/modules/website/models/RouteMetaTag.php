<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecordDetail;

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
