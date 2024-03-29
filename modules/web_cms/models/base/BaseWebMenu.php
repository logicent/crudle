<?php

namespace crudle\ext\web_cms\models\base;

use crudle\app\setting\models\base\BaseMenu;
use Yii;
use yii\helpers\ArrayHelper;

class BaseWebMenu extends BaseMenu
{
    public function rules()
    {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
            [[
                'route', 'label', 'parentLabel', 'icon', 'iconPath', 'iconColor',
            ], 'string'],
            [[
                'openInNewTab', 'alignRight', 'inactive'
            ], 'boolean'],
            [[
                'label'
            ], 'required'],
        ]);
    }

    public function attributeHints()
    {
        return [
            'icon' => Yii::t('app', 'If icon is set, it will be shown instead of label'),
            'route' => Yii::t('app', 'The URL to page link. Leave it blank to make label a group parent.'),
            'parentLabel' => Yii::t('app', 'If you set this it will show label in a drop-down of selected parent.'),
        ];
    }
}