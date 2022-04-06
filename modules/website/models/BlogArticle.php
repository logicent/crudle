<?php

namespace website\models;

use app\modules\main\models\base\BaseActiveRecord;
use app\modules\setup\models\ListViewSettingsForm;
use website\enums\Status_Article;
use Yii;
use yii\helpers\ArrayHelper;

class BlogArticle extends BaseActiveRecord
{
    public function init()
    {
        $this->listSettings = new ListViewSettingsForm();
        $this->listSettings->listNameAttribute = 'title'; // override in view index
    }

    public static function tableName()
    {
        return 'site_post';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['content', 'tags'], 'string'],
            [['title', 'slug'], 'string', 'max' => 280],
            [[
                'layout', 'author', 'route', 'status', 'featured_image', 'category_id', 'parent'
            ], 'string', 'max' => 140],
            [['published'], 'boolean'],
            [['date_published'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_id' => Yii::t('app', 'Category'),
            'featured_image' => Yii::t('app', 'Featured image'),
            'date_published' => Yii::t('app', 'Date published')
        ]);
    }

    public static function enums()
    {
        return [
            'status' => Status_Article::class
        ];
    }
}
