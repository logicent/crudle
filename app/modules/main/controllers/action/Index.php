<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\helpers\Url;

class Index extends Action
{
    public function run()
    {
        $searchModelClass = $this->controller->searchModelClass();
        $searchClassname = StringHelper::basename($searchModelClass);

        // check if global search is used to fetch result
        if (!empty(Yii::$app->request->get('GlobalSearch')))
        {
            $globalSearchTerm = [
                $searchClassname => [
                    $searchModelClass::listNameAttribute() => Yii::$app->request->get('GlobalSearch')['gs_term'],
                ],
            ];
            $userFilters = $globalSearchTerm;
        }
        else
            $userFilters = Yii::$app->request->queryParams;

        $searchModel = new $searchModelClass;
        $dataProvider = $searchModel->search($userFilters);

        if (Yii::$app->request->isAjax)
            return $this->controller->renderAjax('@appMain/views/list/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        else
            return $this->controller->render('@appMain/views/list/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }
}
