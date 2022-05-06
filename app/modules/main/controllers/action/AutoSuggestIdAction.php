<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class AutoSuggestIdAction extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax)
        {
            $model = new $this->controller->modelClass();
            return $model->autoSuggestId();
        }
        // else
        Yii::$app->end();
    }
}