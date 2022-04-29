<?php

$this->title = Yii::t('app', 'CMS');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/cms']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@app_main/views/_layouts/_menu_in_page', ['menuList' => $menuList])
?>