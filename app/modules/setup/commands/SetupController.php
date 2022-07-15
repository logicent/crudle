<?php
namespace crudle\app\setup\commands;

use crudle\app\helpers\App;
use crudle\app\main\models\auth\People;
use Yii;
use yii\console\Controller;
use yii\db\IntegrityException;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\helpers\Inflector;

class SetupController extends Controller
{
    /** @var array */
    public $excludeTables = [
        'auth',
        'auth_assignment',
        'auth_item',
        'auth_item_child',
        'auth_rule',
        // 'data_import',
        'data_model',
        'data_model_field',
        'data_widget',
        'dashboard',
        'dashboard_widget',
        'email_digest',
        'email_notification',
        'email_queue',
        'email_template',
        'i18n_message',
        'i18n_source_message',
        'i18n_timezone',
        'migration',
        'people',
        'print_format',
        'print_style',
        'migration',
        'settings',
        'report_auto_email',
        'report_builder',
        'report_builder_item',
        'report_template',
        'report_template_detail',
        'user',
        'user_group',
        'user_log',
        'user_settings',
    ];

    /** @var array */
    public $excludeColumns = [
        'id',
        'status',
        'comments',
        'tags',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
    ];

    public function init()
    {
        // Check if prerequisites are installed locally or just ask the user to install them
        // - Git
        // - Composer
        // - NPM

        // - Clone the github repo `git@github.com:logicent/yii2-crudle.git && cd yii2-crudle`

        // - Run `composer install`

        // "ln -sf bower-asset vendor/bower"

        // - Run `npm install -g bower && npm install -g bower-npm-resolver`

        // - Run `bower install`

        // - Create a database and update your `.env` settings

        // - Run `./yii migrate --migration-path 'app/database/migrations'`

        // - Run `cat app/database/seeds/people.sql | mysql -u your_root_user -p your_db_name`

        // - Run `./yii user/create-superuser "my_password"` and `./yii rbac/init`
    }

    public function actionDeployStatus($env)
    {
        return $env;
    }

    public function actionPopulateDataModelTables()
    {
        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will populate `data_model` and `data_model_field` from columns in `' . $dbName . '` DB tables.' . PHP_EOL)) {
            // Yii::$app->db->createCommand("SET foreign_key_checks = 0")->execute();
            $tableSchemas = Yii::$app->db->schema->getTableSchemas();
            foreach ($tableSchemas as $tableSchema) {
                if (in_array($tableSchema->name, $this->excludeTables))
                    continue;

                $modelName = Inflector::camelize($tableSchema->name);

                $this->stdout('Populating ' . $modelName . ' model table schema...' . PHP_EOL);

                $user = People::findOne(['user_role' => 'Administrator']);

                Yii::$app->db
                        ->createCommand()
                        ->upsert(
                            'data_model',
                            [
                                'id' => $modelName,
                                'name' => Inflector::camel2words($modelName),
                                'module' => App::getModuleOf($modelName),
                                'status' => 0, // Active - Yes
                                'is_table' => 1,
                                'created_at' => date('Y-m-d H:i:s'),
                                'created_by' => $user->id,
                                'updated_at' =>  date('Y-m-d H:i:s'),
                                'updated_by' => $user->id,
                            ]
                        )
                        ->execute();

                $this->stdout('Populating `' . $tableSchema->name . '` column schemas...' . PHP_EOL);

                $fields = [];
                foreach ($tableSchema->columns as $column) {
                    if (in_array($column->name, $this->excludeColumns))
                        continue;

                    $fields[] = [
                        'id' => uniqid(),
                        'label' => Inflector::titleize($column->name),
                        'model_name' => $modelName,
                        'field_name' => $column->name,
                        'field_type' => $column->type,
                        'db_type' => $column->type,
                        'mandatory' => !$column->allowNull,
                        'unique' => $column->isPrimaryKey || $column->autoIncrement,
                        'length' => $column->size,
                        'options' => null,
                    ];
                }
                $tableColumns = [
                    'id',
                    'label',
                    'model_name',
                    'field_name',
                    'field_type',
                    'db_type',
                    'mandatory',
                    'unique',
                    'length',
                    'options',
                ];
                try {
                    Yii::$app->db
                            ->createCommand()
                            ->batchInsert(
                                'data_model_field',
                                $tableColumns,
                                $fields
                            )
                            ->execute();
                } catch (IntegrityException $e) {
                    Console::error($e->getMessage());
                    Yii::$app->end(1);
                }
            }
            // Yii::$app->db->createCommand("SET foreign_key_checks = 1")->execute();
            $this->stdout('Done.' . PHP_EOL, Console::FG_GREEN);
        }
    }
}
