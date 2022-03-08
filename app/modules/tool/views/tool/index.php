<?php

$this->title = Yii::t('app', 'Tool');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/tool']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_list', ['menuList' => $menuList])
?>