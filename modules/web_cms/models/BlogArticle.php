<?php

namespace crudle\ext\web_cms\models;

use crudle\app\crud\models\ActiveRecord;
use crudle\app\main\forms\UploadForm;
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

        $this->uploadForm = new UploadForm();
        $this->fileAttribute = 'featured_image';
    }

    public static function tableName()
    {
        return '{{%Site_Post}}';
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['title', 'route'], 'required'],
            [['content', 'post_comments'], 'string'],
            [['post_likes', 'post_views', 'post_read_time', 'word_count'], 'integer'],
            [['title', 'intro'], 'string', 'max' => 280],
            [['status'], 'default', 'value' => Status_Article::Draft],
            [[
                'layout', 'author', 'route', 'status', 'featured_image', 'category_id', 'post_series_id'
            ], 'string', 'max' => 140],
            [['published'], 'boolean'],
            [['date_published'], 'date', 'format' => 'php:Y-m-d']
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_id' => Yii::t('app', 'Category'),
            'featured_image' => Yii::t('app', 'Featured image'),
            'date_published' => Yii::t('app', 'Date published'),
            'word_count' => Yii::t('app', 'Word count'),
            'post_read_time' => Yii::t('app', 'Read time'),
            'post_likes' => Yii::t('app', 'Likes'),
            'post_views' => Yii::t('app', 'Views'),
            'post_series_id' => Yii::t('app', 'Series (Parent)'),
            'post_comments' => Yii::t('app', 'Reader comments'),
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
