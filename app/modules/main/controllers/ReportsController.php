<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_View;
use crudle\app\main\models\ReportBuilder;
use crudle\app\main\models\ReportBuilderItem;
use Yii;
use yii\data\ActiveDataProvider;

class ReportsController extends BaseViewController
{
    public $layout = '@appMain/views/_layouts/report';

    public $reports;

    public function init()
    {
        parent::init();
        $this->reports = ReportBuilder::find()->where(['inactive' => false])->asArray()->all();
    }

    public function actions()
    {
        return [];
    }

    public function actionIndex($id = null)
    {
        $model = ReportBuilder::findOne(['route' => $id]);
       
        
        if ($model != null) {

            $columns = ReportBuilderItem::find()->where(['report_builder_id' => $model->id])->select('attribute_name')->column();

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




        // $columns = array_diff_key($model->attributeLabels(), $model->skip_in_report);

        // return $this->renderAjax('/report/index', [
        //     'title' =>  Inflector::titleize($this->id),
        //     // 'module' => Inflector::titleize(Inflector::pluralize($this->id)),
        //     'showFilters' => true,
        //     'pickColumns' => [], // Add column and drag to change position
        //     'sortBy' => [],
        //     'showTotals' => false,
        //     'columns' => $columns, // headers
        //     'rows' => $model->getReportData($columns),
        //     'totals' => []
        // ]);
    }

    public function pageNavbar(): string
    {
        return '@appMain/views/_layouts/main/_navbar';
    }

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::List;
    }
}
