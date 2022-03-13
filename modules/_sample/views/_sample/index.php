<?php

$this->title = Yii::t('app', 'Sample');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/_sample']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_list', ['menuList' => $menuList])
?>