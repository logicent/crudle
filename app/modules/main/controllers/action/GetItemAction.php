<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class GetItemAction extends Action
{
    public function run()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelClass = Yii::$app->request->get('modelClass');
            $modelId = Yii::$app->request->get('modelId');
            $model = $modelClass::findOne($modelId);
            if (!$model)
                $model = new $modelClass();

            return $this->controller->asJson([]);
        }
        // else
        Yii::$app->end();
    }
}