<?php

namespace app\modules\customize\controllers;

use app\controllers\base\BaseCrudController;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\modules\customize\models\DocType;
use app\modules\customize\models\DocTypeSearch;
use app\modules\customize\models\DocTypeField;
use app\modules\customize\models\DocTypeFieldSearch;

/**
 * DocTypeController implements the CRUD actions for DocType model.
 */
class DocTypeController extends BaseCrudController
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->modelClass = DocType::class;
        $this->modelSearchClass = DocTypeSearch::class;

        return parent::init();
    }

    /**
     * Creates a new DocType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $this->model = new DocType();
        $this->detailModels = [];

        $formDetails = Yii::$app->request->post('DocTypeField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            $modelDetail = new DocTypeField(['scenario' => DocTypeField::SCENARIO_BATCH_ACTION]);
            $modelDetail->attributes = $formDetail;
            $modelDetail->actionType = DocTypeField::ACTION_TYPE_CREATE;
            $this->detailModels[] = $modelDetail;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => DocTypeField::find()->where(['doc_type' => '']),
        ]);

        $dataProvider->setModels( !empty($this->detailModels) ? $this->detailModels :  [new DocTypeField(['scenario' => DocTypeField::SCENARIO_BATCH_ACTION])] );

        // handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $this->model->load(Yii::$app->request->post());
            $this->detailModels[] = new DocTypeField(['scenario' => DocTypeField::SCENARIO_BATCH_ACTION]);
            $dataProvider->setModels( $this->detailModels );

            return $this->render('create', [
                'model' => $this->model,
                'fieldDataProvider' => $dataProvider,
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
                        $modelDetail->doc_type = $this->model->name;
                        $modelDetail->save(false);
                    }
                    $this->model->createTable();
                }
                return $this->redirect(['view', 'id' => $this->model->name]);
            }
        }

        return $this->render('create', [
            'model' => $this->model,
            'fieldDataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing DocType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetails = $model->docTypeFields;

        $formDetails = Yii::$app->request->post('DocTypeField', []);
        foreach ($formDetails as $i => $formDetail) 
        {
            //loading the models if they are not new
            if (isset($formDetail['name']) && isset($formDetail['actionType']) && $formDetail['actionType'] != DocTypeField::ACTION_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = DocTypeField::findOne(['name' => $formDetail['name'], 'doc_type' => $model->name]);
                $modelDetail->setScenario(DocTypeField::SCENARIO_BATCH_ACTION);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[$i] = $modelDetail;
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
            } 
            else {
                $modelDetail = new DocTypeField(['scenario' => DocTypeField::SCENARIO_BATCH_ACTION]);
                $modelDetail->attributes = $formDetail;
                $modelDetail->actionType = DocTypeField::ACTION_TYPE_CREATE;
                $modelDetails[] = $modelDetail;
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => DocTypeField::find()->where(['doc_type' => '']),
        ]);

        //handling if the addRow button has been pressed
        if ( isset( Yii::$app->request->post()['addRow']) ) 
        {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new DocTypeField(['scenario' => DocTypeField::SCENARIO_BATCH_ACTION]);
            $dataProvider->setModels( $modelDetails );

            $this->model = $model;

            return $this->render('update', [
                'model' => $model,
                'fieldDataProvider' => $dataProvider,
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
                        if ($modelDetail->actionType == DocTypeField::ACTION_TYPE_DELETE) {
                            $modelDetail->delete();
                        } else {
                            //new or updated records go here
                            $modelDetail->doc_type = $model->name;
                            $modelDetail->save(false);
                        }                        
                    }
                    // $model->updateTable(); // TODO: define method in model
                }
                return $this->redirect(['view', 'id' => $model->name]);
            }
            else
            {
                Yii::$app->session->setFlash( 'error', $model->errors);
            }
        }

        $dataProvider->setModels( !empty($modelDetails) ? $modelDetails :  [new DocTypeField(['scenario' => DocTypeField::SCENARIO_BATCH_ACTION])] );

        $this->model = $model;

        return $this->render('update', [
            'model' => $model,
            'fieldDataProvider' => $dataProvider,
        ]);
    }

    public function fieldList()
    {
        $searchModel = new DocTypeFieldSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return [
            'fieldSearchModel' => $searchModel,
            'fieldDataProvider' => $dataProvider,
        ];
    }
}
