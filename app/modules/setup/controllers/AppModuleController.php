<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_View;
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

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::Workspace;
    }

    public function formViewType()
    {
        return Type_Form_View::Single;
    }

    public function showViewSidebar(): bool
    {
        // Todo: Fix clashes with crud sidebar
        return true;
    }
}
