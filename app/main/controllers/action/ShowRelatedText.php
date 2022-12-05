<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class ShowRelatedText extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax) {
            $modelClass = Yii::$app->request->get('model_class');
            $model = $modelClass::findOne(Yii::$app->request->get('field_id'));
            $attribute = Yii::$app->request->get('text_col');
            return $model->$attribute;
        }
        // else
        Yii::$app->end();
    }
}