<?php

$this->title = Yii::t('app', 'Setup');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_page_list', ['menuList' => $menuList]);