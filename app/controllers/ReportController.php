<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use app\modules\setup\models\ReportBuilder;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ReportController extends BaseController
{
    public $reports;

    public function init()
    {
        $this->sidebar = true;
        $this->sidebarWidth = 'four';
        $this->mainWidth = 'twelve';

        return parent::init();
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