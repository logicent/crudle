<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\helpers\Url;

class IndexAction extends Action
{
    public function run()
    {
        // Url::remember(Yii::$app->request->getUrl(), Yii::$app->controller->id);

        $searchModelClass = $this->controller->searchModelClass();
        $searchClassname = StringHelper::basename($searchModelClass);
        // filter out the (soft) deleted data
        $prefilter = [
            $searchClassname => [
                'deleted_at' => null
            ]
        ];

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

        $listFilters = ArrayHelper::merge($prefilter, $userFilters);
        $searchModel = new $searchModelClass;
        $dataProvider = $searchModel->search($listFilters);

        // $this->sidebar = false;

        if (Yii::$app->request->isAjax)
            return $this->controller->renderAjax('@app_main/views/list/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        else
            return $this->controller->render('@app_main/views/list/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }
}