<?php

$this->title = Yii::t('app', 'People');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['/people']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_list', ['menuList' => $menuList])
?>