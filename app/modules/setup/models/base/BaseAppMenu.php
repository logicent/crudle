<?php

namespace crudle\app\setup\models\base;

use Yii;
use yii\helpers\ArrayHelper;

class BaseAppMenu extends BaseMenu
{
    public $parentLabel = false;

    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'route', 'label', 'icon', 'iconColor',
            ], 'string'],
            [[
                'alignRight', 'inactive'
            ], 'boolean'],
            [[
                'label', 'route'
            ], 'required'],
        ]);
    }
}