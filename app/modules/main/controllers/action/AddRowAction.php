<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class AddRowAction extends Action
{
    public function run()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelClass = Yii::$app->request->get('modelClass');
            $model = new $modelClass();
            // check for additional query params in get request
            if ( !empty(Yii::$app->request->queryParams) )
                $model->attributes = Yii::$app->request->queryParams;

            if ( !empty( $model->foreignKeyAttribute() ))
                $model->{ $model->foreignKeyAttribute() } = Yii::$app->request->get( $model->foreignKeyAttribute() );

            $formView = Yii::$app->request->get('formView');
            $itemModelClass = Yii::$app->request->get('itemModelClass');
            return $this->controller->renderPartial($formView, [
                                        'itemModelClass' => !empty($itemModelClass) ? $itemModelClass : null,
                                        'rowId' => Yii::$app->request->get('nextRowId'),
                                        'model' => $model,
                                        'formData' => null
                                    ]);
        }
        // else
        Yii::$app->end();
    }
}