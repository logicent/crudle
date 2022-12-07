<?php

namespace crudle\app\list_view\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;

class EditRow extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax) // !! isAjax won't work in Htmx use isPost or check headers (HX-Request).
        {
            $modelClass = Yii::$app->request->post('_model_class');
            $model = new $modelClass();

            $rowData = ArrayHelper::map(
                Yii::$app->request->post('_row_values'),
                'name',
                'value'
            );
            $rowId = Yii::$app->request->post('_row_counter');
            $prefix = strlen("{$model->formName()}[$rowId]");
            $formData = [];
            foreach ($rowData as $name => $value) {
                $key = substr($name, $prefix);
                $key = trim($key, '[]');
                $formData[$key] = $value;
            }
            $model->setAttributes($formData);
            $modalFormView = Yii::$app->request->post('_modal_form');
            return $this->controller->renderAjax($modalFormView, [
                'model' => $model,
                'rowId' => $rowId,
            ]);
        }
        // else
        Yii::$app->end();
    }
}
