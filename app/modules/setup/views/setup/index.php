<?php

$this->title = Yii::t('app', 'Setup');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['index']];

$menuList = require __DIR__ . '/_menu.php';

echo $this->render('//_layouts/_menu_list', ['menuList' => $menuList])
?>