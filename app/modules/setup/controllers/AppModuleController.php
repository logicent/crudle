<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use Yii;

class AppModuleController extends BaseViewController
{
    public function actions()
    {
        return [
        ];
    }

    public function actionIndex()
    {
        $modules = Yii::$app->getModules();

        foreach ($modules as $id => $module)
        {
            $module = Yii::$app->getModule($id);
            $module = Yii::getObjectVars($module);
        }

        // use ArrayDataProvider to populate list view

        return $this->render('index');
    }
}
