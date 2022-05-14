<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

class EditRow extends Action
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

            $formData = Yii::$app->request->get('formData');
            $formData = ArrayHelper::map($formData, 'name', 'value');
            $formView = Yii::$app->request->get('formView');
            return $this->renderAjax($formView, [
                        'model' => $model,
                        'modelClass' => StringHelper::basename($modelClass),
                        'formData' => $formData,
                        'rowId' => trim(Yii::$app->request->get('rowId')),
                    ]);
        }
        // else
        Yii::$app->end();
    }
}