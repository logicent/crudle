<?php

namespace crudle\app\database\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use yii\helpers\Inflector;
use yii\console\ExitCode;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class DbController extends Controller
{
    /**
     * @throws \yii\base\InvalidRouteException
     * @throws \yii\console\Exception
     */
    public function actionSetup()
    {
        \Yii::$app->runAction('migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('rbac-migrate/up', ['interactive' => $this->interactive]);
    }

    /**
     * Truncates all tables in the database.
     * @throws \yii\db\Exception
     */
    public function actionTruncate()
    {
        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will truncate all tables of current database [' . $dbName . '].')) {
            Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
            $tables = Yii::$app->db->schema->getTableNames();
            foreach ($tables as $table) {
                $this->stdout('Truncating table ' . $table . PHP_EOL, Console::FG_RED);
                Yii::$app->db->createCommand()->truncateTable($table)->execute();
            }
            Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
        }
    }

    /**
     * Drops all tables in the database.
     * @throws \yii\db\Exception
     */
    public function actionDrop()
    {
        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will drop all tables of current database [' . $dbName . '].')) {
            Yii::$app->db->createCommand("SET FOREIGN_KEY_CHECKS=0")->execute();
            $tables = Yii::$app->db->schema->getTableNames();
            foreach ($tables as $table) {
                $this->stdout('Dropping table ' . $table . PHP_EOL, Console::FG_RED);
                Yii::$app->db->createCommand()->dropTable($table)->execute();
            }
            Yii::$app->db->createCommand("SET FOREIGN_KEY_CHECKS=1")->execute();
        }
    }

    /**
     * @param string $charset
     * @param string $collation
     * @throws \yii\base\ExitException
     * @throws \yii\base\NotSupportedException
     * @throws \yii\db\Exception
     */
    public function actionAlterCharset($charset = 'utf8mb4', $collation = 'utf8mb4_unicode_ci')
    {
        if (Yii::$app->db->getDriverName() !== 'mysql') {
            Console::error('Only mysql is supported');
            Yii::$app->end(1);
        }

        if (!$this->confirm("Convert tables to character set {$charset}?")) {
            Yii::$app->end();
        }

        $tables = Yii::$app->db->getSchema()->getTableNames();
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS = 0')->execute();
        foreach ($tables as $table) {
            $command = Yii::$app->db->createCommand("ALTER TABLE {$table} CONVERT TO CHARACTER SET :charset COLLATE :collation")->bindValues([
                ':charset' => $charset,
                ':collation' => $collation
            ]);
            $command->execute();
        }
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS = 1')->execute();
        Console::output('All ok!');
    }

    /**
     * Adds random data useful for the frontend application.
     *
     * @param integer $count the amount of random data to be generated
     * @return void
     */
    public function actionDemoData()
    {
        // get demo data file
        // if (!class_exists(Factory::class)) {
        //     Console::output('Faker should be installed. Run `composer install --dev`');
        //     return ExitCode::CONFIG;
        // }

        // add demo data query

        return ExitCode::OK;
    }
}
