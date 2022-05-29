<?php

namespace crudle\app\main\controllers\action;

use crudle\app\helpers\App;
use Yii;
use yii\base\Action;
use yii\helpers\Html;
use yii\helpers\Inflector;

class LoadModelsByModule extends Action
{
    public function run()
    {
        if (Yii::$app->request->isAjax)
        {
            $moduleDirname = Inflector::underscore(
                Inflector::id2camel(Yii::$app->request->get('list_item'))
            );
            $moduleDir = Yii::getAlias('@extModules/' . $moduleDirname);
            $models = App::getModelsFromExtModule($moduleDir);

            $selectOptions = Html::tag('option', '', ['value' => ' ']);;
            foreach ($models as $modelClass => $modelName)
                $selectOptions .= Html::tag('option', $modelName, ['value' => $modelClass]);

            return $selectOptions;
        }
        // else
        Yii::$app->end();
    }
}