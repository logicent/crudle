<?php

namespace crudle\app\helpers;

use Yii;
use kartik\mpdf\Pdf;

class PdfGenerator
{
    public static function createPdf($content, $saveToFile = false)
    {
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssFile' => '@vendor/bower/semantic/dist/semantic.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
            // set mPDF properties on the fly
            'options' => ['title' => 'PMS Upcoming Activity'],
            // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Planned Events'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        if ($saveToFile)
        {
            $mpdf = $pdf->api; // fetches mpdf api
            $mpdf->SetHeader('Weekly Events Digest'); // call methods or set any properties
            $mpdf->WriteHtml($content); // call mpdf write html
            
            echo $mpdf->Output(Yii::getAlias('@web') . '/downloads/weekly_events_digest', 'D'); // call the mpdf api output as needed
        }
        else
            // return the pdf output as per the destination setting
            return $pdf->render(); 
    }
}