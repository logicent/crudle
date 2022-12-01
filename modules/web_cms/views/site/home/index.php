<?php

$this->title = Yii::t('app', 'Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home'), 'url' => ['/home']];

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => '' // fetch from route meta in setup
]);
// author
// description
// generator
// keywords
// viewport