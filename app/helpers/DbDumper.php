<?php

namespace app\helpers;

use Yii;
use Spatie\DbDumper\Databases\MySql;
use Spatie\DbDumper\Compressors\GzipCompressor;
use Spatie\DbDumper\Exceptions\DumpFailed;

class DbDumper 
{
    public static function createDbDump()
    {
        $db = Yii::$app->getDb();
        $dbName = Yii::$app->db->createCommand("SELECT DATABASE()")->queryScalar();
        $dbFile = Yii::getAlias('@app/../storage/backups/') . $dbName . '_' . date('Y-m-d_H-i') . '.sql.gz';

        try {
            MySql::create()
                // ->setDumpBinaryPath('/custom/location')
                ->setDbName($dbName)
                ->setUserName($db->username)
                ->setPassword($db->password)
                // ->includeTables([])
                ->excludeTables(['people'])
                // ->setHost($host)
                ->addExtraOption('--single-transaction')
                ->addExtraOption('--no-tablespaces')
                ->useCompressor(new GzipCompressor())
                ->dumpToFile($dbFile);
                // ->getDumpCommand($dbFile, Yii::getAlias('@app/') . 'db_credentials.txt');
                // ->addExtraOption('--all-databases')
                // ->addExtraOption('--databases dbname') // overrides setDbName()
                // ->addExtraOption('--add-drop-database')
                // ->doNotCreateTables()
        } catch (DumpFailed $e) {
            return $e->getMessage();
        }

        if (file_exists($dbFile))
            return true;
        // else
        return false;
    }
}