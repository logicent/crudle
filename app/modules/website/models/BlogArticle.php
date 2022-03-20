<?php

namespace app\modules\website\models;

use app\models\base\BaseActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class BlogArticle extends BaseActiveRecord
{
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
            [['layout', 'author', 'route', 'status', 'parent'], 'string', 'max' => 140],
            [['published'], 'boolean'],
            [['date_published'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'date_published' => Yii::t('app', 'Date published')
        ]);
    }
}
