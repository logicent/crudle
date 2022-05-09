<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

$viewPath = $this->context->module->viewPath . '/' .
            Inflector::underscore(
                Inflector::id2camel($this->context->module->id)
            );
$menuList = require $viewPath . '/_menu.php';
$menuList = ArrayHelper::index($menuList, 'route');

$route = '/'. $this->context->module->id .'/'. $this->context->id .'/index';
$menuItem = $menuList[$route];

echo $this->render('@appMain/views/_layouts/_menu_in_side', [
        'menuList' => $menuList,
        'menuGroup' => $menuItem['group']
    ]);