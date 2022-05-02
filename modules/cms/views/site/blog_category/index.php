<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category'), 'url' => ['/category']];

foreach ($categories as $category) :
    echo Html::a($category->name, "/blog/category/{$category->id}");
endforeach;