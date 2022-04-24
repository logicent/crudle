<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseViewController;
use Yii;

class AppModuleController extends BaseViewController
{
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
