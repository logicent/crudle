<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class Update extends Action
{
    public function run($id)
    {
        // 1. use parent controller
        $controller = $this->controller;
        // a. create main model instance
        $controller->getModel($id);

        // 2. save if request is via post
        if ( Yii::$app->request->isPost )
            return $controller->saveModel(); // store data

        // 3. get related models if loading forms
        if ( Yii::$app->request->isGet )
            $controller->getDetailModels();

        // 4. load the view response
        return $controller->loadView(); // show view
    }
}