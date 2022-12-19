<?php

namespace crudle\app\database\models;

use yii\base\Model;

class GlobalSearch extends Model
{
    public $gs_term;

    public function rules()
    {
        return [
            [['gs_term'], 'safe'],
        ];
    }

    public function get()
    {
        return;
    }
}
