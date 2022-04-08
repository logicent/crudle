<?php

namespace website\models;

use app\modules\main\models\base\BaseActiveRecord;
use app\modules\setup\models\ListViewSettingsForm;
use website\enums\Status_Article;

class WebForm extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'title'; // override in view index
    }

    public static function tableName()
    {
        return 'site_form';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['published', 'full_width', 'show_title'], 'boolean'],
        ];
    }

    public static function enums()
    {
        return [
            'status' => Status_Article::class
        ];
    }
}
