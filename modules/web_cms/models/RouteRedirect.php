<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\models\ActiveRecord;

class RouteRedirect extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Site_Redirect}}';
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
