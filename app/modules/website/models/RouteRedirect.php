<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecord;

class RouteRedirect extends BaseActiveRecord
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
