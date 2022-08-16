<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\action\Index;
use crudle\app\main\controllers\base\BaseCrudController;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use crudle\app\setup\models\DataModel;
use crudle\app\setup\models\search\DataModelSearch;
use crudle\app\setup\models\DataModelField;
use crudle\app\setup\models\search\DataModelFieldSearch;

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

    public function actions()
    {
        return [
            'index' => Index::class,
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
        $this->getDetailModels();

        $formDetails = Yii::$app->request->post('DataModelField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            $modelDetail = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $modelDetail->attributes = $formDetail;
            $modelDetail->actionType = DataModelField::ACTION_TYPE_CREATE;
            $this->detailModels[] = $modelDetail;
        }

        $this->fieldDataProvider = new ActiveDataProvider([
            'query' => DataModelField::find()->where(['model_name' => '']),
        ]);

        $this->fieldDataProvider->setModels( !empty($this->detailModels) ? $this->detailModels :  [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

        // handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $this->model->load(Yii::$app->request->post());
            $this->detailModels[] = new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION]);
            $this->fieldDataProvider->setModels( $this->detailModels );

            return $this->render('@appMain/views/crud/index', [
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
                        $modelDetail->model_name = $this->model->name;
                        $modelDetail->save(false);
                    }
                    $this->model->createTable();
                }
                return $this->redirect(['update', 'id' => $this->model->name]);
            }
        }

        return $this->render('@appMain/views/crud/index', [
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

            return $this->render('@appMain/views/crud/index', [
                'model' => $model,
            ]);
        }

        $postData = Yii::$app->request->post();
        if ($postData) {
            if ($model->load($postData, 'DataModel'))
            {
                $this->loadDetailModels(DataModelField::class, $formDetails);
                if ($this->validateDetailModels() && $model->validate()) 
                {
                    if ( $model->save(false) ) 
                    {
                        // echo '<pre>';print_r($this->detailModels);exit;
                        foreach($modelDetails['dataModelFields'] as $modelDetail) 
                        // foreach($this->detailModels['DataModelField'] as $id => $detailModel) 
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
                    Yii::$app->session->setFlash( 'error', $model->errors);
                }
            }
        }

        $this->fieldDataProvider->setModels( !empty($modelDetails) ? $modelDetails['dataModelFields'] :  [new DataModelField(['scenario' => DataModelField::SCENARIO_BATCH_ACTION])] );

        $this->model = $model;

        return $this->render('@appMain/views/crud/index', [
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

        return $this->render('@appMain/views/crud/index', [
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
