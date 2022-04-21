<?php

namespace crudle\main\controllers;

use crudle\main\controllers\base\BaseViewController;
use crudle\setup\models\ReportBuilder;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ReportController extends BaseViewController
{
    public $layout = '@app_main/views/_layouts/report';

    public $reports;

    public function init()
    {
        parent::init();

        $this->viewPath = Yii::getAlias('@app_main/views/report');
        // return;
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
    }
}
