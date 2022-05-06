<?php

namespace crudle\app\main\controllers\action;

use Yii;
use yii\base\Action;

class DownloadAction extends Action
{
    public function run($res)
    {
        $file = base64_decode($res);

        header('Content-type:application/pdf');
        header('Content-Disposition:attachment;filename="download.pdf"');
        readfile($file);

        // $response = Yii::$app->response->setDownloadHeaders('download', 'application/pdf');
        // if (file_exists($file))
        //     return $response->xSendFile($file);
    }
}