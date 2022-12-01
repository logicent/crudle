<?php

$this->title = Yii::t('app', 'Main');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Main'), 'url' => ['/main']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/views/_layouts/_nav/_menu_in_page', ['menuList' => $menuList]);