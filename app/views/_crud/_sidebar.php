<?php

use yii\helpers\ArrayHelper;

$viewPath = $this->context->module->viewPath . '/' . $this->context->module->id;
$menuList = require $viewPath . '/_menu.php';
$menuList = ArrayHelper::index($menuList, 'route');

$route = '/'. $this->context->module->id .'/'. $this->context->id;
$menuItem = $menuList[$route];

echo $this->render('//_layouts/_menu_in_side', [
        'menuList' => $menuList,
        'menuGroup' => $menuItem['group']
    ]);