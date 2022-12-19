<?php

namespace crudle\app\database\controllers;

use crudle\app\main\controllers\base\BaseController;
use crudle\app\database\models\GlobalSearch;
use Yii;

class GlobalSearchController extends BaseController
{
    public function actions()
    {
        return [
        ];
    }

    public function actionIndex()
    {
        $model = new GlobalSearch();

        if ( $model->load( Yii::$app->request->post() ) && $model->get() )
        {
            echo "Not implemented yet";
        }

        return $this->goBack();
    }
}