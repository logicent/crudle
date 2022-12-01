<?php

$this->title = Yii::t('app', 'Setup');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/views/_layouts/_nav/_menu_in_page', ['menuList' => $menuList]);