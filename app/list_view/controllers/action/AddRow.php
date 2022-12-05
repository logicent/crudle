<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class AddRow extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax) // !! isAjax won't work in Htmx use isPost or check headers (HX-Request).
        {
            $modelClass = Yii::$app->request->get('_model_class');
            $model = new $modelClass();
            // check for additional query params in get request
            if (!empty(Yii::$app->request->queryParams))
                $model->attributes = Yii::$app->request->queryParams;

            if (!empty($model->foreignKeyAttribute()))
                $model->{$model->foreignKeyAttribute()} = Yii::$app->request->get($model->foreignKeyAttribute());

            $rowInputsView = Yii::$app->request->get('_row_inputs');
            return $this->controller->renderPartial($rowInputsView, [
                'rowId' => (int) Yii::$app->request->get('_row_counter') + 1,
                'model' => $model,
                'modelClass' => $modelClass,
            ]);
        }
        // else
        Yii::$app->end();
    }
}
