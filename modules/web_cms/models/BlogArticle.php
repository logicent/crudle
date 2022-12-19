<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\models\ActiveRecord;
use crudle\app\setting\enums\Status_Transaction;
use crudle\ext\web_cms\enums\Status_Article;
use Yii;
use yii\helpers\ArrayHelper;

class BlogArticle extends ActiveRecord
{
    public function init()
    {
        parent::init();
        $this->listSettings->listIdAttribute = 'title';
        $this->listSettings->listNameAttribute = 'title';
    }

    public static function tableName()
    {
        return '{{%Site_Post}}';
    }

    public function rules()
    {
        return [
            [['title', 'route'], 'required'],
            [['content', 'tags'], 'string'],
            [['title'], 'string', 'max' => 280],
            [['status'], 'default', 'value' => Status_Transaction::Draft],
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
            'status' => [
                'class' => Status_Article::class,
                'attribute' => 'status'
            ]
        ];
    }
}
