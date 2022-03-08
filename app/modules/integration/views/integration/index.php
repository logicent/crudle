<?php

$this->title = Yii::t('app', 'Integration');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/integration']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_list', ['menuList' => $menuList])
?>