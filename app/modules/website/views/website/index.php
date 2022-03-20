<?php

$this->title = Yii::t('app', 'Website');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/website']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_page_list', ['menuList' => $menuList])
?>