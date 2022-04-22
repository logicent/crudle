<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use crudle\setup\models\DataModel;
use crudle\setup\models\DataModelSearch;
use crudle\setup\models\DataModelField;
use crudle\setup\models\DataModelFieldSearch;

/**
 * DataModelController implements the CRUD actions for DataModel model.
 */
class DataModelController extends BaseCrudController
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

    /**
     * Creates a new DataModel model.
     * If creation is successful, the browser will be redirected to the 'read' view.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $this->model = new DataModel();
        $this->detailModels = [];

        $formDetails = Yii::$app->request->post('DataModelField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            $modelDetail = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $modelDetail->attributes = $formDetail;
            $modelDetail->actionType = DataModelField::ACTION_TYPE_CREATE;
            $this->detailModels[] = $modelDetail;
        }

        $this->fieldDataProvider = new ActiveDataProvider([
            'query' => DataModelField::find()->where(['data_model' => '']),
        ]);

        $this->fieldDataProvider->setModels( !empty($this->detailModels) ? $this->detailModels :  [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

        // handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $this->model->load(Yii::$app->request->post());
            $this->detailModels[] = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $this->fieldDataProvider->setModels( $this->detailModels );

            return $this->render('@app_main/views/crud/index', [
                'model' => $this->model,
            ]);
        }

        if ($this->model->load(Yii::$app->request->post())) 
        {
            if (Model::validateMultiple($this->detailModels) && $this->model->validate()) 
            {
                // use AR/DB transaction here ?
                if ( $this->model->save(false) ) 
                {
                    foreach($this->detailModels as $modelDetail) 
                    {
                        $modelDetail->data_model = $this->model->name;
                        $modelDetail->save(false);
                    }
                    $this->model->createTable();
                }
                return $this->redirect(['update', 'id' => $this->model->name]);
            }
        }

        return $this->render('@app_main/views/crud/index', [
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
        $modelDetails = $model->dataModelFields;

        $formDetails = Yii::$app->request->post('DataModelField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            //loading the models if they are not new
            if (isset($formDetail['name']) && isset($formDetail['actionType']) && $formDetail['actionType'] != DataModelField::ACTION_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = DataModelField::findOne(['name' => $formDetail['name'], 'data_model' => $model->name]);
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
            'query' => DataModelField::find()->where(['data_model' => '']),
        ]);

        //handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $this->fieldDataProvider->setModels( $modelDetails );

            $this->model = $model;

            return $this->render('@app_main/views/crud/index', [
                'model' => $model,
            ]);
        }

        if ($model->load(Yii::$app->request->post())) 
        {
            if (Model::validateMultiple($modelDetails) && $model->validate()) 
            {
                if ( $model->save(false) ) 
                {
                    foreach($modelDetails as $modelDetail) 
                    {
                        //details that has been flagged for deletion will be deleted
                        if ($modelDetail->actionType == DataModelField::ACTION_TYPE_DELETE) {
                            $modelDetail->delete();
                        } else {
                            //new or updated records go here
                            $modelDetail->data_model = $model->name;
                            $modelDetail->save(false);
                        }                        
                    }
                    // $model->updateTable(); // TODO: define method in model
                }
                return $this->redirect(['update', 'id' => $model->name]);
            }
            else
            {
                Yii::$app->session->setFlash( 'error', $model->errors);
            }
        }

        $this->fieldDataProvider->setModels( !empty($modelDetails) ? $modelDetails :  [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

        $this->model = $model;

        return $this->render('@app_main/views/crud/index', [
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
}
