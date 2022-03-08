<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Customize');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customize'), 'url' => ['/customize']];

$menuList = require __DIR__ . '/_menu.php';


echo $this->render('//_layouts/_menu_list', ['menuList' => $menuList])
?>