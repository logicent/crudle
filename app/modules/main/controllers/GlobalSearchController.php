<?php

namespace crudle\main\controllers;

use crudle\main\controllers\base\BaseController;
use crudle\main\models\GlobalSearch;
use Yii;

class GlobalSearchController extends BaseController
{
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