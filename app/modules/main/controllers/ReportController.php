<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\setup\models\ReportBuilder;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ReportController extends BaseViewController
{
    public $layout = '@appMain/views/_layouts/report';

    public $reports;

    public function init()
    {
        parent::init();

        $this->viewPath = Yii::getAlias('@appMain/views/report');
        // return;
    }

    public function actions()
    {
        return [
        ];
    }

    public function actionIndex($id = null)
    {
        if ($id) {
            $rptModel = ReportBuilder::findOne($id);
            $this->modelClass = $rptModel->model_name;
            // apply soft delete filter
            $query = $this->modelClass::find()->where(['deleted_at' => null]);

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                // 'sort' => false,
                // 'pagination' => false
            ]);

            return $this->renderAjax('_list/list', [
                'dataProvider' => $dataProvider,
                'reportTitle' => $rptModel->title,
                'hideId' => true,
                'columns' => ArrayHelper::map($rptModel->reportBuilderItems, 'attribute_name', 'attribute_name')
            ]);
        }

        $this->reports = ReportBuilder::find()->asArray()->all();

        return $this->render('index', []);

        // $model = new $this->modelClass();

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
}
