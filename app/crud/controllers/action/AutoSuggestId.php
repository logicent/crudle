<?php

namespace crudle\app\crud\controllers\action;

use Yii;
use yii\base\Action;

class AutoSuggestId extends Action
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