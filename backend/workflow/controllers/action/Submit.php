<?php

namespace crudle\app\workflow\controllers\action;

use crudle\app\workflow\enums\Status_Transaction;
use yii\base\Action;

class Submit extends Action
{
    public function run($id)
    {
        // 1. use parent controller
        $controller = $this->controller;
        // a. create main model instance
        $model = $controller->getModel($id);
        $model->status = Status_Transaction::Submitted;
        $model->save(false);

        return $controller->redirect(['index']);
    }
}