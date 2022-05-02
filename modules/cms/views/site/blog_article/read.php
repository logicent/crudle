<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Blog Article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Article'), 'url' => ['/blog']];

echo Elements::header($article->title);

echo Html::tag('div', $article->content);