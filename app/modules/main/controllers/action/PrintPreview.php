<?php

namespace crudle\app\main\controllers\action;

use crudle\app\main\enums\Type_View;
use Yii;
use yii\base\Action;

class PrintPreview extends Action
{
    public function run()
    {
        $id = Yii::$app->request->get('id');
        $this->model = $this->findModel($id);
        $this->detailModels = $this->model->links();

        $this->layout = 'print';

        if (Yii::$app->request->get('viewType') == Type_View::List)
            return $this->actionIndex();
        // else
        return $this->render('readonly', [
            'model' => $this->model,
            'modelDetails' => $this->detailModels
        ]);
    }
}