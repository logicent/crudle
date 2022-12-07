<?php

$this->title = Yii::t('app', 'Web CMS');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/web-cms']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('@appMain/layouts/_nav/_menu_in_page', ['menuList' => $menuList])
?>