<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\Json;

class LoadFormFieldByType extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax)
        {
            $viewPath = Yii::$app->request->post('field_view') ?? '@appMain/views/_form_field/';
            $viewName = Yii::$app->request->post('field_type');
            $options = Yii::$app->request->post('field_options');
            return $this->renderPartial($viewPath . $viewName, Json::decode($options));
        }
        // else
        Yii::$app->end();
    }
}
