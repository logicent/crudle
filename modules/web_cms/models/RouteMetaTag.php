<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\models\ActiveRecordDetail;

class RouteMetaTag extends ActiveRecordDetail
{
    public static function tableName()
    {
        return '{{%Site_Route_Meta}}';
    }

    public function rules()
    {
        return [
            [['key', 'value'], 'string'],
        ];
    }
}
