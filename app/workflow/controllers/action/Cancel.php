<?php

namespace crudle\app\workflow\controllers\action;

use crudle\app\workflow\enums\Status_Transaction;
use Yii;
use yii\base\Action;

class Cancel extends Action
{
    public function run($id)
    {
        // 1. use parent controller
        $controller = $this->controller;
        // a. create main model instance
        $model = $controller->getModel($id);
        $model->status = Status_Transaction::Canceled;
        $model->save(false);

        return $controller->redirect(['index']);
    }
}