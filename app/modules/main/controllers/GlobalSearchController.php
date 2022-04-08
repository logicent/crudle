<?php

namespace app\modules\main\controllers;

use app\modules\main\controllers\base\BaseController;
use app\modules\main\models\GlobalSearch;
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