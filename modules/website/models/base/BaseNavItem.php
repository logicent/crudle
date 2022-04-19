<?php

namespace website\models\base;

use crudle\main\models\base\BaseActiveRecord;
use Yii;

class BaseNavItem extends BaseActiveRecord
{
    public static function tableName()
    {
        return 'site_nav';
    }

    public function rules()
    {
        return [
            [['label'], 'required'],
            [['open_in_new_tab', 'align_right', 'inactive'], 'boolean'],
            [['url', 'parent_label', 'icon'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'label' => Yii::t('app', 'Label'),
            'url' => Yii::t('app', 'URL'),
            'open_in_new_tab' => Yii::t('app', 'Open URL in a new tab'),
            'align_right' => Yii::t('app', 'Align right'),
            'parent_label' => Yii::t('app', 'Parent label'),
            'icon' => Yii::t('app', 'Icon'),
            'inactive' => Yii::t('app', 'Inactive'),
        ];
    }

    public function attributeHints()
    {
        return [
            'url' => Yii::t('app', 'Link to the page you want to open. Leave blank if you want to make it a group parent.'),
            'parent_label' => Yii::t('app', 'If you set this, this Item will come in a drop-down under the selected parent.'),
            'icon' => Yii::t('app', 'If Icon is set, it will be shown instead of Label'),
        ];
    }
}
