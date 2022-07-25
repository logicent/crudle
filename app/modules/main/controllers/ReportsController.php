<?php

namespace crudle\app\main\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_View;
use crudle\app\main\models\ReportBuilder;
use Yii;

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
        return [
        ];
    }

    public function actionIndex($id = null)
    {
        $model = ReportBuilder::findOne(['route' => $id]);

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('index', [
                'model' => $model
            ]);
        // else
        return $this->render('index', [
            'model' => $model
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
