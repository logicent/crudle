<?php

namespace app\helpers;

use Yii;

use yii\db\TableSchema;
use yii\db\mssql\PDO;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

use SplTempFileObject;
use yii\helpers\Inflector;

class CsvCreator
{
    public function writeToFile($data, $columnLabels, $filename, $downloadFile = false)
    {
        // create the CSV into memory or save to a file
        if ($downloadFile)
            $csv = Writer::createFromFileObject(new SplTempFileObject());
        else {
            $file_path = Yii::getAlias('@app/../downloads/') . $filename . '_' . date('Y-m-d') . '.csv';
            $csv = Writer::createFromPath($file_path, 'w');
        }

        // insert the CSV header(s)
        $csv->insertOne(['PMS']);
        $csv->insertOne([]); // append empty row
        $csv->insertOne([]); // append empty row
        $csv->insertOne(['Notes:']);
        $csv->insertOne([]);
        $csv->insertOne([]); // append empty row
        $csv->insertOne($columnLabels);
        
        $sth = $data;
        // The PDOStatement Object implements the Traversable Interface
        // that's why Writer::insertAll can directly insert
        // the data into the CSV
        $csv->insertAll($sth);

        // Because you are providing the filename you don't have to ...
        // set the HTTP headers Writer::output can directly set them for you
        // The file is downloadable
        if ($downloadFile)
        {
            $csv->output($filename);
            die;
        }

        return $file_path;
    }
}