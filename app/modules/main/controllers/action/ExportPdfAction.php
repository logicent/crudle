<?php

namespace crudle\app\main\controllers\action;

use crudle\app\helpers\PdfHelper;
use crudle\app\main\enums\Type_View;
use Yii;
use yii\base\Action;
use yii\helpers\Inflector;

class ExportPdfAction extends Action
{
    public function run()
    {
        $id = Yii::$app->request->get('id');
        $this->model = $this->findModel($id);
        $this->detailModels = $this->model->links();

        $this->layout = 'print';

        if (Yii::$app->request->get('viewType') == Type_View::List)
            $html = $this->actionIndex();
        else
            $html = $this->render('readonly', [
                'model' => $this->model,
                'modelDetails' => $this->detailModels
            ]);

        if (in_array('status', $this->modelClass::attributes()))
            $statusLabel = '_' . $this->model->status;
        else
            $statusLabel = null;
        $fileName = Inflector::camelize($this->viewName()) . '_' . $this->model->id  . $statusLabel . '.pdf';

        $pdf = new PdfHelper();
        $file = $pdf->writeFromHtml($html, $fileName, [
            'skip-cdn' => true,
            'css' => Yii::getAlias('@vendor/bower/semantic-ui/dist/semantic.css'),
            'js' => Yii::getAlias('@vendor/bower/semantic-ui/dist/semantic.min.js'),
        ]);

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$fileName}");
        readfile($file);
    }
}