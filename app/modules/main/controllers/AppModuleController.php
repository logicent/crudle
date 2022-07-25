<?php

namespace crudle\app\main\controllers;

use crudle\app\helpers\App;
use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_View;
use yii\data\ArrayDataProvider;
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
        $modules = App::getModuleList();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $modules,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'class'],
            ],
        ]);

        // retrieves paginated and sorted data
        $models = $dataProvider->getModels();

        // get the number of data items in the current page
        $count = $dataProvider->getCount();

        // get the total number of data items across all pages
        $totalCount = $dataProvider->getTotalCount();

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
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
