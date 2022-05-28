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

            $rowData = Yii::$app->request->get('rowData');
            $rowData = ArrayHelper::map($rowData, 'name', 'value');
            $editView = Yii::$app->request->get('editView');
            return $this->controller->renderAjax($editView, [
                        'model' => $model,
                        'modelClass' => StringHelper::basename($modelClass),
                        'rowData' => $rowData,
                        'rowId' => trim(Yii::$app->request->get('rowId')),
                    ]);
        }
        // else
        Yii::$app->end();
    }
}