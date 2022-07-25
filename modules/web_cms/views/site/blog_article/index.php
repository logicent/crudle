<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['/blog']];

foreach ($articles as $article) :
    echo Html::a($article->title, "/blog/{$article->id}");
endforeach;