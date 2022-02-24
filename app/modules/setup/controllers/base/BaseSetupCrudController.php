<?php

namespace app\modules\setup\controllers\base;

use app\controllers\base\BaseCrudController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Inflector;

abstract class BaseSetupCrudController extends BaseCrudController
{
    public function init()
    {
        parent::init();
        if ($this->module->id !== 'setup')
            $baseViewPath = Yii::getAlias('@modules/') . $this->module->id . '/views';
        else
            $baseViewPath = Yii::getAlias('@setup/views');

        $this->viewPath = $baseViewPath . '/' . Inflector::underscore(
            Inflector::id2camel($this->id)
        );
        // return;
    }

    public function actionIndex()
    {
        // apply soft delete filter
        $query = $this->modelClass::find()->where(['deleted_at' => null]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false, // check if default sort is defined in model class and apply
            'pagination' => false
        ]);

        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
