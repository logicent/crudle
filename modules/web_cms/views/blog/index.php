<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['/blog']];

echo Elements::header(Yii::t('app', 'Sorry, page not found!'));
