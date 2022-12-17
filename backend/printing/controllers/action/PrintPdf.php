<?php

namespace crudle\app\printing\controllers\action;

use crudle\app\main\helpers\PdfCreator;
use Yii;
use yii\base\Action;
use yii\helpers\Inflector;

class PrintPdf extends Action
{
    public function run($id)
    {
        $pdf = new PdfCreator();

        $modelClass = Yii::$app->request->get('modelClass');
        $id = Yii::$app->request->get('id');
        $this->model = $modelClass::findOne($id);
        $this->detailModels = $this->model->links();

        // $this->layout = 'print'; // ?

        $html = $this->render('readonly', [
            'model' => $this->model,
            'modelDetails' => $this->detailModels
        ]);

        $fileName = Inflector::camelize($this->viewName()) . '_' . $this->model->id  . '.pdf';
        $file = $pdf->saveToFile($html, $fileName);

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$fileName}");
        readfile($file);
    }
}