<?php

namespace crudle\app\main\helpers;

use Yii;

use yii\db\TableSchema;
// use yii\db\mssql\PDO;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use SplTempFileObject;

class SpreadsheetCreator
{
    public function writeToFile($data, $columnLabels, $filename, $spreadsheet_options, $downloadFile = false)
    {
        $file_path = Yii::getAlias('@app/../downloads/') . $filename . '_' . date('Y-m-d') . '.xlsx';

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
        ->setTitle("PMS");

        $sheet = $spreadsheet->getActiveSheet();
        // $sheet->setCellValue('A1', 'PMS');
        // $sheet->setCellValue('A2', '');
        // $sheet->setCellValue('A3', '');
        // $sheet->setCellValue('A4', 'Notes:');
        // $sheet->setCellValue('A5', 'Please take note of the upcoming events and prepare accordingly.');
        // $sheet->setCellValue('A6', '');

        $sheet->fromArray(
            $columnLabels,  // The data to set
            NULL,        // Array values with this value will not be set
            'A1'         // Top left coordinate of the worksheet range where we want to set these values (default is A1)
        );
        $sheet->fromArray(
            $data,  // The data to set
            NULL,   // Array values with this value will not be set
            'A2'    // Top left coordinate of the worksheet range where we want to set these values (default is A1)
        );

        // Setting Worksheet option
        // Default Options
        $sheet->setAutoFilter($sheet->calculateWorksheetDimension());
        $sheet->getDefaultColumnDimension()->setWidth(24);
        $sheet->getRowDimension('1')->setRowHeight(30);

        $column_dimensions = $spreadsheet_options['column_dimension'];

        if(!empty($column_dimensions))
        {
            foreach ($column_dimensions as $column => $width) {
                $sheet->getColumnDimension($column)->setWidth($width);
            }

        }

        // Header style ArrayObject
        $styleArrayHeader = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'C5E0B3',
                ],
            ],
        ];

        $sheet->getStyle($spreadsheet_options['header_range'])->applyFromArray($styleArrayHeader);

        // $conditional1 = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
        // $conditional1->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT);
        // $conditional1->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_BEGINSWITH);
        // $conditional1->addCondition('WEEK');
        // $conditional1->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
        // $conditional1->getStyle()->getFont()->setBold(true);
        //
        // $conditionalStyles = $sheet->getStyle($sheet->calculateWorksheetDimension())->getConditionalStyles();
        // $conditionalStyles[] = $conditional1;
        //
        // $sheet->getStyle($sheet->calculateWorksheetDimension())->setConditionalStyles($conditionalStyles);

        $sheet->getStyle($sheet->calculateWorksheetDimension())
              ->getAlignment()
              ->setWrapText(true);
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_path);

        return $file_path;
    }

    public function sendToFile($rows, $columnLabels, $filename, $spreadsheet_options, $downloadFile = false)
    {
        $file_path = Yii::getAlias('@app/../downloads/') . $filename . '_' . date('Y-m-d') . '.xls';

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
        ->setTitle('Untitled');

        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->fromArray(
            $columnLabels,  // The headers to set
            null,        // Array values with this value will not be set
            'A1'         // Top left coordinate of the worksheet range where we want to set these values (default is A1)
        );

        $sheet->fromArray(
            $rows,  // The data to set
            null,   // Array values with this value will not be set
            'A2'    // Top left coordinate of the worksheet range where we want to set these values (default is A1)
        );

        // Setting Worksheet option
        // Default Options
        $sheet->setAutoFilter($sheet->calculateWorksheetDimension());
        $sheet->getDefaultColumnDimension()->setWidth(24);
        $sheet->getRowDimension('1')->setRowHeight(30);

        $styleArrayHeader = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'C5E0B3',
                ],
            ],
        ];

        $sheet->getStyle($sheet->calculateWorksheetDimension())
              ->getAlignment()
              ->setWrapText(true);
        $writer = new Xls($spreadsheet);
        $writer->save($file_path);

        // error_reporting(0); // Errors may corrupt download
        // ob_start();

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition:attachment;filename="' . basename($file_path) . '"');
        header("Cache-Control: max-age=0");
        
        // ob_clean();
        // ob_end_flush();

        readfile($file_path);

        return $file_path;
    }
}
