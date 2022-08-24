<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Blog Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Category'), 'url' => ['/blog/category']];

echo Elements::header($category->name);
echo Html::tag('div', $category->description);
