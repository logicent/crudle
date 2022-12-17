<?php

namespace crudle\app\database\controllers;

use crudle\app\crud\controllers\action\EditRow;
use crudle\app\crud\controllers\CrudController;
use crudle\app\list_view\controllers\action\Index;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use crudle\app\database\models\DataModel;
use crudle\app\database\models\search\DataModelSearch;
use crudle\app\database\models\DataModelField;
use crudle\app\database\models\search\DataModelFieldSearch;

/**
 * DataModelController implements the CRUD actions for DataModel model.
 */
class DataModelController extends CrudController
{
    public $fieldDataProvider;

    public function modelClass(): string
    {
        return DataModel::class;
    }

    public function searchModelClass(): string
    {
        return DataModelSearch::class;
    }

    public function actions()
    {
        return [
            'index' => Index::class,
            'edit-row' => EditRow::class,
        ];
    }

    /**
     * Creates a new DataModel model.
     * If creation is successful, the browser will be redirected to the 'read' view.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $this->model = new DataModel();
        $modelDetails = $this->getDetailModels();

        $formDetails = Yii::$app->request->post('DataModelField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            $modelDetail = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $modelDetail->attributes = $formDetail;
            $modelDetail->actionType = DataModelField::ACTION_TYPE_CREATE;
            $modelDetails[] = $modelDetail;
        }

        $this->fieldDataProvider = new ActiveDataProvider([
            'query' => DataModelField::find()->where(['model_name' => '']),
        ]);

        $this->fieldDataProvider->setModels( !empty($modelDetails) ? $modelDetails['dataModelFields'] :  [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

        // handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $this->model->load(Yii::$app->request->post(), 'DataModel');
            unset($modelDetails['dataModelFields']); // To-Do: fix later by refactoring this action method
            $modelDetail = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $modelDetail->model_name = $this->model->id;
            $modelDetails[] = $modelDetail;
            $this->fieldDataProvider->setModels( $modelDetails );

            return $this->render('@appModules/crud/views/crud/index', [
                'model' => $this->model,
            ]);
        }

        if ($this->model->load(Yii::$app->request->post(), 'DataModel'))
        {
            $hasDetailModels = $this->loadDetailModels(DataModelField::class, $formDetails);
            if ($this->validateDetailModels() && $this->model->validate()) 
            {
                if ( $this->model->save(false) && $hasDetailModels) 
                {
                    foreach($this->detailModels['DataModelField'] as $modelDetail) 
                    {
                        $modelDetail->model_name = $this->model->id;
                        $modelDetail->save(false);
                    }
                    if ((bool) $this->model->is_table)
                        $this->model->createTable();
                }
                return $this->redirect(['update', 'id' => $this->model->id]);
            }
            else
            {
                Yii::$app->session->setFlash( 'errors', $this->validationErrors);
            }
        }

        return $this->render('@appModules/crud/views/crud/index', [
            'model' => $this->model,
        ]);
    }

    /**
     * Updates an existing DataModel model.
     * If update is successful, the browser will be redirected to the 'read' view.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetails = $this->getDetailModels();

        $formDetails = Yii::$app->request->post('DataModelField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            //loading the models if they are not new
            if (isset($formDetail['field_name']) &&
                isset($formDetail['actionType']) && $formDetail['actionType'] != DataModelField::ACTION_TYPE_CREATE)
            {
                //making sure that it is actually a child of the main model
                $modelDetail = DataModelField::findOne(['field_name' => $formDetail['field_name'], 
                                                        'model_name' => $model->id]);
                $modelDetail->setScenario(DataModelField::SCENARIO_BATCH_ACTION);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[$i] = $modelDetail;
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
            } 
            else {
                $modelDetail = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
                $modelDetail->attributes = $formDetail;
                $modelDetail->actionType = DataModelField::ACTION_TYPE_CREATE;
                $modelDetails[] = $modelDetail;
            }
        }

        $this->fieldDataProvider = new ActiveDataProvider([
            'query' => DataModelField::find()->where(['model_name' => '']),
        ]);

        //handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $model->load(Yii::$app->request->post(), 'DataModel');
            unset($modelDetails['dataModelFields']); // To-Do: fix later by refactoring this action method
            $modelDetail = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $modelDetail->model_name = $model->id;
            $modelDetails[] = $modelDetail;
            $this->fieldDataProvider->setModels( $modelDetails );

            $this->model = $model;

            return $this->render('@appModules/crud/views/crud/index', [
                'model' => $model,
            ]);
        }

        $postData = Yii::$app->request->post();
        if ($postData) {
            if ($model->load($postData, 'DataModel'))
            {
                $detailModels = $this->_reIndexFieldList($formDetails);
                $hasDetailModels = $this->loadDetailModels(DataModelField::class, $detailModels);
                if ($this->validateDetailModels() && $model->validate()) 
                {
                    if ( $model->save(false) && $hasDetailModels) 
                    {
                        foreach($this->detailModels['DataModelField'] as $modelDetail) 
                        {
                            // details that has been flagged for deletion will be deleted
                            if ($modelDetail->actionType == DataModelField::ACTION_TYPE_DELETE) {
                                $modelDetail->delete();
                            } else {
                                // new or updated records go here
                                $modelDetail->model_name = $model->id;
                                $modelDetail->save(false);
                            }
                        }
                        // $model->updateTable(); // TODO: define method in model
                    }
                    return $this->redirect(['update', 'id' => $model->id]);
                }
                else
                {
                    Yii::$app->session->setFlash( 'errors', $this->validationErrors);
                }
            }
        }

        $this->fieldDataProvider->setModels( !empty($modelDetails) ? $modelDetails['dataModelFields'] :  [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

        $this->model = $model;

        return $this->render('@appModules/crud/views/crud/index', [
            'model' => $model,
        ]);
    }

    /**
     * Reads an existing DataModel model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionRead($id)
    {
        $model = $this->findModel($id);
        $modelDetails = $this->getDetailModels();

        $this->fieldDataProvider = new ActiveDataProvider([
            'query' => DataModelField::find()->where(['model_name' => $id]),
        ]);

        $this->fieldDataProvider->setModels(
            !empty($modelDetails['dataModelFields']) ?
                $modelDetails['dataModelFields'] :
                [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );
        $this->model = $model;

        return $this->render('@appModules/crud/views/crud/index', [
            'model' => $model,
        ]);
    }

    public function fieldList()
    {
        $searchModel = new DataModelFieldSearch();
        $this->fieldDataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return [
            'fieldSearchModel' => $searchModel,
        ];
    }

    private function _reIndexFieldList(&$formDetails)
    {
        $colIndex = 0;
        foreach ($formDetails as $i => $formDetail) 
        {
            $colIndex = $colIndex + 1;
            $formDetail['col_index'] = $colIndex;
            $formDetails[$i] = $formDetail;
        }

        return $formDetails;
    }

    public function actionReIndexFieldList()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelId = Yii::$app->request->post('modelId');
            $model = DataModel::findOne($modelId);
            if (is_null($model))
                $model = new DataModel();
            $rows = Yii::$app->request->post('gridData');
            $modelDetails = []; $colIndex = 0;
            foreach ($rows as $row) {
                $modelDetail = DataModelField::findOne($row['id']);
                if (is_null($modelDetail))
                    $modelDetail = new DataModelField();
                $modelDetail->col_index = $colIndex + 1;
                $modelDetails[] = $modelDetail;
            }

            $fieldDataProvider = new ActiveDataProvider([
                'query' => DataModelField::find()->where(['model_name' => '']),
            ]);
            $fieldDataProvider->setModels(!empty($modelDetails) ?
                    $modelDetails :
                    [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

            return 
                $this->controller->renderAjax('@appSetup/views/data_model/field/list_columns', [
                    'dataProvider' => $fieldDataProvider,
                    'model' => $model,
                ]);
        }
        // else
        Yii::$app->end();
    }
}
