<?php

namespace app\helpers;

use mikehaertl\wkhtmlto\Pdf;
use Yii;

class PdfCreator
{
    public function saveToFile($html, $fileName)
    {
        // You can pass a filename, a HTML string, an URL or an options array to the constructor
        $pdf = new Pdf(
            // [
            //     'no-outline',   // Make Chrome not complain
            //     'margin-top'    => 0,
            //     'margin-right'  => 0,
            //     'margin-bottom' => 0,
            //     'margin-left'   => 0,

            //     // Default page options
            //     'disable-smart-shrinking',
            //     'user-style-sheet' => Yii::getAlias('@webroot/css/tacit-css.min.css'),
            // ]
        );

        // On some systems you may have to set the path to the wkhtmltopdf executable
        // $pdf->binary = 'C:\...';

        $filePath = Yii::getAlias('@app/../storage/downloads/') . $fileName;

        if (!$pdf->send()) { // saveAs($filePath)
            $error = $pdf->getError();
            // ... handle error here
        }

        return $filePath;
    }
}