<?php

namespace crudle\app\main\controllers\action;

use crudle\app\helpers\App;
use Yii;
use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\Inflector;

class LoadAttributesByModel extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax)
        {
            $modelClass = Yii::$app->request->get('list_item');
            $attributes = (new $modelClass)->attributes();
            
            $selectOptions = Html::tag('option', '', ['value' => ' ']);;
            foreach ($attributes as $attribute) {
                $attributeLabel = Inflector::camel2words(Inflector::camelize($attribute));
                $selectOptions .= Html::tag('option', $attributeLabel, ['value' => $attribute]);
            }

            return $selectOptions;
        }
        // else
        Yii::$app->end();
    }
}
