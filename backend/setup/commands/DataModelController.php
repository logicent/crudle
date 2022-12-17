<?php
namespace crudle\app\setup\commands;

use crudle\app\main\helpers\App;
use crudle\app\main\models\auth\People;
use Yii;
use yii\console\Controller;
use yii\db\IntegrityException;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\helpers\Inflector;

class DataModelController extends Controller
{
    /** @var array */
    public $excludeTables = [
        'crdl_Auth',
        'crdl_Auth_Assignment',
        'crdl_Auth_Item',
        'crdl_Auth_Item_Child',
        'crdl_Auth_Rule',
        'crdl_Data_Import',
        'crdl_Data_Model',
        'crdl_Data_Model_Field',
        'crdl_Data_Widget',
        'crdl_Dashboard',
        'crdl_Dashboard_Widget',
        'crdl_Deleted_Record',
        'crdl_Email_Digest',
        'crdl_Email_Notification',
        'crdl_Email_Queue',
        'crdl_Email_Template',
        'crdl_I18n_Message',
        'crdl_I18n_Source_Message',
        'crdl_I18n_Timezone',
        'crdl_Print_Format',
        'crdl_Print_Style',
        'crdl_Migration',
        'crdl_Settings',
        'crdl_Report_Auto_Email',
        'crdl_Report_Builder',
        'crdl_Report_Builder_Item',
        'crdl_Report_Template',
        'crdl_Report_Template_Detail',
        'crdl_User',
        'crdl_User_Group',
        'crdl_User_Log',
        'crdl_User_Settings',
        'crdl_People',
        'migration',
        'crdl_Site_Form',
        'crdl_Site_Form_Field',
        'crdl_Site_Page',
        'crdl_Site_Post',
        'crdl_Site_Post_Author',
        'crdl_Site_Post_Category',
        'crdl_Site_Sidebar',
        'crdl_Site_Slide',
    ];

    /** @var array */
    public $excludeColumns = [
        // 'id',
        // 'status',
        'comments',
        'tags',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    const DataModel = 'crdl_Data_Model';
    const DataModelField = 'crdl_Data_Model_Field';

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

    public function actionPopulateTableSchemas($tablePrefix = null)
    {
        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will populate `' . self::DataModel . '` and `' . self::DataModelField . '` from columns in `' . $dbName . '` DB tables.' . PHP_EOL)) {
            Yii::$app->db->createCommand('SET foreign_key_checks=0')->execute();
            $this->stdout('Preparing...' . PHP_EOL, Console::FG_YELLOW);
            $this->stdout('Truncating table...' . self::DataModelField . PHP_EOL, Console::FG_RED);
            Yii::$app->db->createCommand()->truncateTable(self::DataModelField)->execute();
            $this->stdout('Truncating table...' . self::DataModel . PHP_EOL, Console::FG_RED);
            Yii::$app->db->createCommand()->truncateTable(self::DataModel)->execute();

            $this->stdout('Starting...' . PHP_EOL, Console::FG_YELLOW);

            $tableSchemas = Yii::$app->db->schema->getTableSchemas();
            foreach ($tableSchemas as $tableSchema) {
                if (in_array($tableSchema->name, $this->excludeTables))
                    continue;

                $modelName = str_replace($tablePrefix, '', $tableSchema->name);
                $modelName = Inflector::camelize($modelName);

                $this->stdout('Populating table schema of model...' . $modelName . PHP_EOL);

                $user = People::findOne(['username' => 'Administrator']);

                Yii::$app->db
                        ->createCommand()
                        ->upsert(
                            self::DataModel,
                            [
                                'id' => $modelName,
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

                $viewName = Inflector::underscore($modelName);

                $this->stdout('Populating column schemas of view...' . $viewName . PHP_EOL);

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
                                self::DataModelField,
                                $tableColumns,
                                $fields
                            )
                            ->execute();
                } catch (IntegrityException $e) {
                    Console::error($e->getMessage());
                    Yii::$app->end(1);
                }
            }
            Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
            $this->stdout('Finished!' . PHP_EOL, Console::FG_GREEN);
        }
    }

    public function actionPopulateTableSchema($tableName, $tablePrefix = null)
    {
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (in_array($tableSchema->name, $this->excludeTables)) {
            Console::stderr('Table can not be changed');
            Yii::$app->end(1);
        }

        $modelName = str_replace($tablePrefix, '', $tableSchema->name);
        $modelName = Inflector::camelize($modelName);

        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will repopulate table and column schemas from `' . $tableName . '` into `' . self::DataModel . '` and `' . self::DataModelField . '`' . PHP_EOL)) {
            Yii::$app->db->createCommand('SET foreign_key_checks=0')->execute();
            $this->stdout('Preparing...' . PHP_EOL, Console::FG_YELLOW);
            $this->stdout('Deleting child table rows from...' . self::DataModelField . PHP_EOL, Console::FG_RED);
            Yii::$app->db->createCommand()->delete(self::DataModelField, ['model_name' => $modelName])->execute();
            $this->stdout('Deleting table schema row from...' . self::DataModel . PHP_EOL, Console::FG_RED);
            Yii::$app->db->createCommand()->delete(self::DataModel, ['id' => $modelName])->execute();

            $this->stdout('Starting...' . PHP_EOL, Console::FG_YELLOW);

            $this->stdout('Populating table schema of model...' . $modelName . PHP_EOL);

            $user = People::findOne(['username' => 'Administrator']);

            Yii::$app->db
                    ->createCommand()
                    ->upsert(
                        self::DataModel,
                        [
                            'id' => $modelName,
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

            $viewName = Inflector::underscore($modelName);

            $this->stdout('Populating column schemas of view...' . $viewName . PHP_EOL);

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
                            self::DataModelField,
                            $tableColumns,
                            $fields
                        )
                        ->execute();
            } catch (IntegrityException $e) {
                Console::error($e->getMessage());
                Yii::$app->end(1);
            }
        }
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
        $this->stdout('Finished!' . PHP_EOL, Console::FG_GREEN);
    }
}
