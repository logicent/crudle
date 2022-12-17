<?php

// $this->title = Yii::$app->params['appName'];
$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User'), 'url' => ['/user']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/layouts/_nav/_menu_in_page', ['menuList' => $menuList]);