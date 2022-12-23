<?php

namespace crudle\app\report\controllers;

use crudle\app\main\controllers\base\ViewController;
use crudle\app\main\enums\Type_View;
use crudle\app\report\models\ReportQuery;
use crudle\app\report\models\ReportQueryItem;
use Yii;
use yii\data\ActiveDataProvider;

class ViewerController extends ViewController
{
    public $layout = '@appModules/report/layouts/report';

    public $reports;

    public function init()
    {
        parent::init();
        $this->reports = ReportQuery::find()->where(['inactive' => false])->asArray()->all();
    }

    public function actions()
    {
        return [];
    }

    public function actionIndex($id = null)
    {
        $model = ReportQuery::findOne(['route' => $id]);

        if ($model != null) 
        {
            $columns = ReportQueryItem::find()
                            ->where(['query_id' => $model->id])
                            ->select('attribute_name')
                            ->column();
            $query = $model->model_name::find();

            $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'created_at' => SORT_DESC,
                        'title' => SORT_ASC,
                    ]
                ],
            ]);

            // retrieves paginated and sorted data
            $models = $provider->getModels();

            // get the number of data items in the current page
            $count = $provider->getCount();

            // get the total number of data items across all pages
            $totalCount = $provider->getTotalCount();
            
            if (Yii::$app->request->isAjax)
                return $this->renderAjax('@appMain/views/reports/_list/index', [
                    'dataProvider' => $provider,
                    'reportTitle' => $model->title,
                    'hideId' => true,
                    'columns' => $columns
                ]);
            else
                return $this->render('index', [
                    'model' => $model,
                    'dataProvider' => $provider,
                    'columns' => $columns
                ]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function pageNavbar(): string
    {
        return '@appMain/layouts/main/_navbar';
    }

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::List;
    }
}
