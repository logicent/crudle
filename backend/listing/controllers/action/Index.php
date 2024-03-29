<?php

namespace crudle\app\listing\controllers\action;

use Yii;
use yii\base\Action;
use yii\helpers\StringHelper;

class Index extends Action
{
    public function run()
    {
        $searchModelClass = $this->controller->searchModelClass();
        $searchClassname = StringHelper::basename($searchModelClass);
        $searchModel = new $searchModelClass;

        // check if global search is used to fetch result
        if (!empty(Yii::$app->request->get('GlobalSearch')))
        {
            $globalSearchTerm = [
                $searchClassname => [
                    $searchModel->listSettings->listNameAttribute => Yii::$app->request->get('GlobalSearch')['gs_term'],
                ],
            ];
            $userFilters = $globalSearchTerm;
        }
        else
            $userFilters = Yii::$app->request->queryParams;

        $dataProvider = $searchModel->search($userFilters);

        $view = '@appModules/listing/views/grid_view/index'; // To-Do: make this dynamic
        if (Yii::$app->request->isAjax)
            return $this->controller->renderAjax($view, [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        else
            return $this->controller->render($view, [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }
}
