<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class Read extends Action
{
    public function run($id)
    {
        // 1. use parent controller
        $controller = $this->controller;
        // a. create main model instance
        $controller->getModel($id);
        // b. create detail models instances
        $controller->getDetailModels();
        // 2. render form view by request type
        // a. ajax request
        if ( Yii::$app->request->isAjax )
            return $controller->renderAjax($controller->formView());
        // b. http request
        return $controller->render($controller->formView());
    }
}