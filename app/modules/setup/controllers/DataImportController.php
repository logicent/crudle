<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\setup\enums\Type_Role;
use crudle\app\setup\models\DataImportForm;
use League\Csv\Reader;
use League\Csv\Writer;
use League\Csv\Statement;
use SplTempFileObject;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;

class DataImportController extends BaseViewController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => [Type_Role::SystemManager, Type_Role::Administrator],
                    ],
                    [
                        'actions' => ['create', 'delete'],
                        'allow' => true,
                        'roles' => [Type_Role::SystemManager, Type_Role::Administrator],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
        ];
    }

    public function actionExportTemplate()
    {
        $model = new DataImportForm();

        if (Yii::$app->request->post())
        {
            $sourceModelClass = Yii::$app->request->post('source_table_name');
            $sourceModel = new $sourceModelClass();
            $base_table_name = $sourceModelClass::tableName();
            $data_model_name = StringHelper::basename($sourceModelClass);

            $tableSchema = Yii::$app->db->getTableSchema($base_table_name);
            $columns = $tableSchema->columns;

            foreach ($columns as $key => $column)
            {
                if ($key == 'comments' ||
                    $key == 'created_at' || $key == 'updated_at' ||
                    $key == 'created_by' || $key == 'updated_by')
                    continue;

                $columnNames[] = $key;
                $columnLabels[] = $sourceModel->getAttributeLabel($key);
                // ddd($columnLabels);
                // $columnIsMandatory[] = $column->allowNull;
                // $columnDataTypes[] = $column->type;
                // $columnInfo[] = $column->comment;
            }
            // $columnNames['join'] = $sourceModelClass::getForeignKeyNameColumn();
            
            $sth = $sourceModelClass::findExportTemplateData($columnNames);
            // ddd($sth);

            // create the CSV into memory
            $csv = Writer::createFromFileObject(new SplTempFileObject());

            // insert the CSV header(s)
            $csv->insertOne(['Data Import Template']);
            $csv->insertOne(['Model:', $data_model_name]);
            $csv->insertOne([]); // append empty row
            $csv->insertOne([]); // append empty row
            $csv->insertOne(['Notes:']);
            $csv->insertOne(['Please do not change the template headings.']);
            // $csv->insertOne(['First data column must be blank.']);
            $csv->insertOne(['If you are uploading new records, leave the "id" (ID) column blank if present.']);
            $csv->insertOne(['If you are uploading new records, set "code" (Code) column if present without "id" (ID) column.']);
            $csv->insertOne(['You can only upload up to 5000 records in one go.']);
            $csv->insertOne([]); // append empty row
            $csv->insertOne($columnLabels);
            $csv->insertOne($columnNames);
            // $csv->insertOne($columnIsMandatory);
            // $csv->insertOne($columnDataTypes);
            // $csv->insertOne($columnInfo);
            $csv->insertOne(['Start entering data below this line']);

            // The PDOStatement Object implements the Traversable Interface
            // that's why Writer::insertAll can directly insert
            // the data into the CSV
            $csv->insertAll($sth);

            // Because you are providing the filename you don't have to ...
            // set the HTTP headers Writer::output can directly set them for you
            // The file is downloadable
            $csv->output(Inflector::camel2words(Inflector::id2camel($base_table_name)) . ' Template.csv');
            die;
        }
    }

    public function actionIndex()
    {
        $dt_model = new DataImportForm();

        $import_errors = $import_results = $tableColumns = [];

        if 
        ( $dt_model->load( Yii::$app->request->post() ) )
        {
            $dt_model->dataFile = UploadedFile::getInstance( $dt_model, 'dataFile' );
            $uploadExists = 0;

            if 
            ( $dt_model->dataFile) 
            {
                $file_path = Yii::getAlias('@webroot') . '/uploads//' . 
                                $dt_model->dataFile->baseName . '.' . 
                                $dt_model->dataFile->extension;
                $batchInsertValues = [];
                $uploadExists = 1;
            }

            if 
            ( $uploadExists )
            {
                $dt_model->dataFile->saveAs( $file_path );

                $csv = Reader::createFromPath( $file_path, 'r' );

                $stmt = (new Statement())
                        ->offset(1) // to get the model name
                        ->limit(1);

                $records = $stmt->process( $csv );

                foreach 
                ( $records as $record )
                    $modelName = $record[1];  // row 2 - column table name
                
                $import_model_classname = array_flip( $dt_model->getListOptions() ) [ 
                    Inflector::camel2words($modelName)
                    // $modelName
                ];
                
                $pk_column = $import_model_classname::primaryKey() [0]; // assuming single key column?
                
                $csv->setHeaderOffset(11); // row 12 - column headers

                // get at most 5000 records starting from the 14th row
                $stmt = (new Statement())
                        ->offset(12) // row 14 - column values
                        ->limit(5000);

                $records = $stmt->process( $csv );
                
                foreach 
                ( $records as $row => $record )
                {
                    if ( $pk_column == 'id' )
                    {
                        if ( $record[ $pk_column ] !== '' )
                        {
                            $data_model = $import_model_classname::findOne( $record[ $pk_column ] );
                            if ( ! $data_model )
                                $data_model = new $import_model_classname;
                                // continue; // id is autoincrement so should be null
                        }
                        else
                            $data_model = new $import_model_classname;
                    }

                    if ($pk_column == 'code')
                    {
                        if ( $record[ $pk_column ] !== '' )
                        {
                            $data_model = $import_model_classname::findOne( $record[ $pk_column ] );

                            if ( ! $data_model )
                                $data_model = new $import_model_classname;
                            // !!! Important to avoid PK overwite in grants for instance
                            $data_model->enableDataImport = true;
                        }
                        else
                            continue; // code must have a value
                    }
                    // d($data_model->enableDataImport);
                    $data_model->attributes = $record;
                    
                    if 
                    ( ! $data_model->validate() )
                    {
                        foreach
                        ( $record as $attribute => $value )
                        {
                            if
                            ( ! isset( $data_model->errors[ $attribute ] ) )
                                continue;
                            // skip the header rows
                            $import_errors[ $row ] = $data_model->errors[ $attribute ][0];
                        }
                        // skip other import preparation steps below
                        continue;
                    }
                    
                    if 
                    ( $dt_model->addNewRecords && $data_model->isNewRecord)
                    {
                        $record[ 'created_at' ] = date( 'Y-m-d H:m:s', time() );
                        $record[ 'created_by' ] = Yii::$app->user->id;
                        $record[ 'updated_at' ] = date( 'Y-m-d H:m:s', time() );
                        $record[ 'updated_by' ] = Yii::$app->user->id;
                        $record[ 'comments' ] = '';

                        $batchInsertValues[] = $record;

                        $tableColumns = array_keys($record);
                    }
                    
                    if 
                    ($dt_model->updateRecords && !$data_model->isNewRecord)
                    // ( $dt_model->updateRecords && $record[ $pk_column ] !== '' )
                    {
                        $update_models[ $record[ $pk_column ] ] = $data_model;
                    }
                }
                // ddd($batchInsertValues);
                // import only if no validation errors encountered
                if 
                ( empty( $import_errors ) )
                {
                    try
                    { // add new records
                        if ($dt_model->addNewRecords)
                        {
                            Yii::$app->db
                                        ->createCommand("SET FOREIGN_KEY_CHECKS = 0;")
                                        ->execute();
                            Yii::$app->db
                                        ->createCommand()
                                        ->batchInsert(
                                            $import_model_classname::tableName(),
                                            $tableColumns,
                                            $batchInsertValues
                                        )
                                        ->execute();
                            Yii::$app->db
                                        ->createCommand("SET FOREIGN_KEY_CHECKS = 1;")
                                        ->execute();
                        }
                        // update records
                        if ( $dt_model->updateRecords )
                        {
                            foreach ( $update_models as $pk => $update_model )
                            {
                                $update_model->save( false );
                            }
                        }
                    }
                    catch
                    ( \yii\db\Exception $e )
                    {
                        return 
                            $this->render(
                                '/app/error', [
                                    'name' => 'Data Import Setup',
                                    'message' => $e->errorInfo[2]
                                ]
                            );
                    }
                }
            }
        }

        return 
            $this->render('index', [
                    'model' => $dt_model,
                    'import_errors' => $import_errors,
                    // 'import_results' => $import_results
                ]
        );
    }

}
