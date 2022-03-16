<?php

namespace app\controllers\base;

use app\enums\Status_Transaction;
use app\enums\Type_Comment;
use app\enums\Type_Form_View;
use app\modules\setup\enums\Type_Permission;
use app\enums\Type_Relation;
use app\models\CommentForm;
use app\models\Model;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

abstract class BaseCrudController extends BaseController
{
    public $modelSearchClass;
    public $formViewType = Type_Form_View::Multiple;
    public $detailModels = [];
    public $detailModelsErrors = []; // public $errors = []
    public $isReadonly = false; // use in editable data views (check permission and action)

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'read', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'list'],
                        'allow' => true,
                        // 'roles' => [ Type_Permission::List .' '. $this->resourceName ],
                    ],
                    [
                        'actions' => ['read'], // view
                        'allow' => true,
                        'roles' => [ Type_Permission::Read .' '. $this->resourceName ],
                    ],
                    [
                        'actions' => ['update'], // edit
                        'allow' => true,
                        'roles' => [ Type_Permission::Update .' '. $this->resourceName ],
                        // 'roleParams' => function() {
                        //     return ['model' => Person::findOne(Yii::$app->request->get('id'))];
                        // },
                        // 'matchCallback' => function ($rule, $action)
                        // {
                        //     $this->model = Person::findOne(Yii::$app->request->get('id'));
                        //     return  Yii::$app->user->can('Update Own Person', ['model' => $this->model]);
                        // }
                    ],
                    [
                        'actions' => ['create'], // addNew
                        'allow' => true,
                        'roles' => [ Type_Permission::Create .' '. $this->resourceName ],
                    ],
                    [
                        'actions' => ['delete', 'delete-multiple'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Delete .' '. $this->resourceName ],
                    ],
                    [
                        'actions' => ['cancel'],
                        'allow' => true,
                        'roles' => [ Type_Permission::Cancel .' '. $this->resourceName ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'cancel' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchClassname = StringHelper::basename($this->modelSearchClass);
        // filter out the (soft) deleted data
        $prefilter = [
            $searchClassname => [
                'deleted_at' => null
            ]
        ];

        // check if global search is used to fetch result
        if (!empty(Yii::$app->request->get('GlobalSearch')))
        {
            $globalSearchTerm = [
                $searchClassname => [
                    $this->modelSearchClass::listNameAttribute() => Yii::$app->request->get('GlobalSearch')['gs_term'],
                ],
            ];
            $userFilters = $globalSearchTerm;
        }
        else
            $userFilters = Yii::$app->request->queryParams;

        $listFilters = ArrayHelper::merge($prefilter, $userFilters);
        $searchModel = new $this->modelSearchClass();
        $dataProvider = $searchModel->search($listFilters);

        $this->sidebar = false;

        if (Yii::$app->request->isAjax)
            return $this->renderAjax('//_crud/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        else
            return $this->render('//_crud/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionRead( $id )
    {
        // 1. create model instance
        $this->model = $this->findModel( $id );
        $this->detailModels = $this->model->links();

        $this->isReadonly = true;

        // 2. render view by request type
        if ( Yii::$app->request->isAjax )
        {
            return $this->renderAjax( 'read', [
                'model' => $this->model,
                'modelDetails' => $this->detailModels,
            ]);
        }

        // 3. copy model for app-level use
        // $this->model = $this->model;

        // 4. render read
        return $this->render( 'read', [
            'model' => $this->model,
            'modelDetails' => $this->detailModels,
        ]);
    }

    public function actionSubmit($id)
    {
        $this->model = $this->findModel($id);
        $this->model->status = Status_Transaction::Submitted;
        $this->model->save(false);

        return $this->redirect(['index']);
    }

    public function actionCancel($id)
    {
        $this->model = $this->findModel($id);
        $this->model->status = Status_Transaction::Canceled;
        $this->model->save(false);

        return $this->redirect(['index']);
    }

    public function actionCreate( $id = null )
    {
        // Yii::$app->request->isGet && $id
        if ( $id ) {
            // 1a. duplicate model on get request if id != null
            // 1b. get related models if loading forms
            $this->copyModel( $id );
        }
        // Yii::$app->request->isPost || Yii::$app->request->isGet && !$id
        else {
            // 1a. create model instance and initialize detailModels
            $this->model = new $this->modelClass();
            // 1b. set the FK if applicable
            if ( Yii::$app->request->isGet ) {
                // check for additional query params via Ajax request
                if ( !empty(Yii::$app->request->queryParams) )
                    $this->model->attributes = Yii::$app->request->queryParams;

                if ( !empty( $this->model->foreignKeyAttribute() ))
                    $this->model->{ $this->model->foreignKeyAttribute() } = Yii::$app->request->get( $this->model->foreignKeyAttribute() );
            }
        }
        // 1c. autosuggest id value if applicable
        if ( $this->model->autoSuggestIdValue() )
            $this->model->{$this->model->autoSuggestAttribute()} = $this->model->autoSuggestId();

        // 2. save if request is via post
        if ( Yii::$app->request->isPost )
            return $this->saveModel(); // store data

        // 3. load the view response
        return $this->loadView(); // show view
    }

    public function actionUpdate( $id )
    {
        // 1a. create model instance
        $this->model = $this->findModel( $id );

        // 2. save if request is via post
        if ( Yii::$app->request->isPost )
            return $this->saveModel(); // store data

        // 3. get related models if loading forms
        if ( Yii::$app->request->isGet )
            $this->detailModels = $this->model->links();

        // 4. load the view response
        return $this->loadView(); // show view
    }

    protected function saveModel()
    {
        $isNewRecord = $this->model->isNewRecord;

        // 1a. read post data in request
        $postData = Yii::$app->request->post();
        // 1b. check if post request has data
        if ( $postData )
        {
            // 2a. load main form data
            $this->model->load( $postData, $this->model->formName() );
            // 2b. check if file upload is supported in model
            if ( $this->model->allowFileUpload() && isset( $this->model->{ $this->model->fileAttribute } ))
            {
                $filePath = $this->uploadFile( $this->model );
                if ( $filePath )
                    $this->model->{ $this->model->fileAttribute } = $filePath;
            }
            // 2c. load detail form data
            foreach ( $this->model::relations() as $relationId => $relationDetail )
            {
                if ( ! is_array( $relationDetail ) ||
                    ( $relationDetail['type'] == Type_Relation::ParentModel ) ||
                    ( $relationDetail['type'] == Type_Relation::SubModel ) ||
                    ( $relationDetail['type'] == Type_Relation::SiblingModel )
                )
                    continue;

                $relationClass = $relationDetail['class'];
                $formName = StringHelper::basename( $relationClass );
                $detailForms = Yii::$app->request->post( $formName, [] );
                if ( empty( $detailForms ))
                    continue;

                if ( $relationDetail['type'] == Type_Relation::InlineModel )
                    $this->model->{$relationClass::inlineModelAttribute()} = Yii::$app->request->post( $formName );

                if ( $relationDetail['type'] == Type_Relation::ChildModel )
                    $this->loadDetailModels( $relationClass, $detailForms );
            }
            // 3. validate the main form data and tabular data
            if ( $this->model->validate() && $this->validateDetailModels() )
            {
                // 4a. add a comment entry to track model changes
                $comment = new CommentForm();
                if ( $isNewRecord ) {
                    $comment->comment = Yii::t('app', 'created this');
                    $this->model->comments = $comment->addNewEntry( $this->model->comments );
                }
                else // TODO: collect changed values in single variable perhaps using DTO (from spatie)
                    if ( $this->model->valuesChanged() || count( $this->detailModels ) > 0) {
                        $comment->comment = Yii::t('app', 'changed value of') . ' ' . $this->model->getChangedValues() . ' ' . $this->model->detailValuesChanged;
                        $this->model->comments = $comment->addNewEntry( $this->model->comments, false, Type_Comment::ChangeLog );
                    }
                // only run save if new record or values changed in main form or detail forms
                if ( $isNewRecord ||
                    (! $isNewRecord && ($this->model->valuesChanged() || count( $this->detailModels ) > 0))
                )
                    // 4c. save all post data and log changes
                    if ( $this->model->save( false ))
                    {
                        foreach ( $this->detailModels as $modelId => $detailModels )
                            foreach ( $detailModels as $id => $detailModel )
                            {
                                // set/overwrite the FK column value of detailModel
                                if ( $detailModel->foreignKeyAttribute() )
                                    $detailModel->{$detailModel->foreignKeyAttribute()} = $this->model->id;
                                $detailModel->save( false );
                            }
                        // 4d. prepare the email message in queue - skip in update action
                        if ( $isNewRecord && $this->model->allowSendEmail() ) // or notifyUserOnSave() == true
                            $this->model->sendNotificationIf( $this->model, Url::to([ 'read', 'id' => $this->model->id ], true));

                        // 4e. prepare the success flash message
                        $flashMsg = $this->resourceName . ' : #' . $this->model->id .' '. 'was saved successfully';
                        $success = Yii::t( 'app', '{flashMsg}', [ 'flashMsg' => $flashMsg ]);
                        Yii::$app->session->setFlash( 'success', $success );

                        // 4f. return or redirect to allow further edit if settings apply
                        if ( Yii::$app->request->isAjax )
                            return $this->asJson([ 'success' => true ]);
                        // else
                        return $this->redirect(['index']);
                    }
                    else {
                        // save error occurred - most likely in the DB
                        $flashMsg = $this->resourceName . ' : ' . 'could not be saved';
                        $error = Yii::t( 'app', '{flashMsg}', [ 'flashMsg' => $flashMsg ]);
                        if ( Yii::$app->request->isAjax )
                            return $this->asJson([ 'failed' => true, 'error' => $error ]);
                        // else
                        Yii::$app->session->setFlash( 'error', $error );
                        // !! refresh to reload attributes
                        // $this->model->refresh();
                    }
                // nothing changed go back
            }
            else {
                // validation error occurred
                if ( Yii::$app->request->isAjax )
                {
                    $result = [];
                    foreach ( $this->model->getErrors() as $attribute => $errors )
                        $result[ Html::getInputId( $this->model, $attribute ) ] = $errors;

                    if (!empty($this->detailModelsErrors))
                        array_push( $result, $this->detailModelsErrors );
                    return $this->asJson([ 'validation' => $result ]);
                }
                // else
                Yii::$app->session->setFlash( 'errors', $this->model->errors );
                if (!empty($this->detailModelsErrors))
                    Yii::$app->session->setFlash( 'errors', $this->detailModelsErrors );
            }
        }
        // nothing happened go back
        return $this->loadView();
    }

    protected function loadView()
    {
        // 1. load default values for form
        $this->model->loadDefaultValues();
        // $this->loadDetailModelsDefaultValues();

        // 2. render view by request type and action id
        $data = [
            'model' => $this->model,
            'modelDetails' => $this->detailModels,
        ];
        if ( Yii::$app->request->isAjax )
            return $this->renderAjax( $this->action->id, $data );
        // else
        return $this->render( '//_crud//' . $this->action->id, $data );
    }

    protected function copyModel( $id, $includeDetails = true )
    {
        $sourceModel = $this->findModel( $id );
        $sourceDetailModels = $sourceModel->links();

        $this->model = new $this->modelClass();
        $this->model = $this->modelClass::loadDuplicateValues( $sourceModel, $this->model );
        $this->model->isCopyRecord = true;

        if ( $includeDetails )
            $this->model->copyDetailModels = $sourceDetailModels;
    }

    protected function loadDetailModels( $relationClass, $detailForms )
    {
        $formName = StringHelper::basename( $relationClass );
        // load multiple models as alternative to mass assignment in loop below
        // $detailModels[] = Model::loadMultiple( $detailModels, $postData, $formName );
        foreach ( $detailForms as $i => $detailForm)
        {
            $detailModel = $relationClass::findOne($detailForm['id']);
            if ( ! $detailModel )
                $detailModel = new $relationClass(); // ['scenario' => Rule_Scenario::Tabular]

            $detailModel->attributes = $detailForm;
            // $detailModel->actionType = Rule_Scenario::enums()[ Inflector::id2camel( $this->action->id )];

            // check uploaded files if submitted in detail forms
            if ( $this->model->allowFileUpload() )
                if ( isset( $detailModel->{ $detailModel->fileAttribute } ))
                {   // !! assumes multiple uploads in multiple lines
                    $fileNames = $this->uploadAttachments( $detailModel, $i );
                    if ( $fileNames )
                        $detailModel->{ $detailModel->fileAttribute } = $fileNames;
                }
            // TODO: use a helper with DTO to check and collect changed values if any
            if ( $detailModel->valuesChanged() )
                $this->model->detailValuesChanged .= ' '. $detailModel->getChangedValues();

            if ( $detailModel->isNewRecord || $detailModel->valuesChanged() )
                $this->detailModels[$formName][] = $detailModel;
        }
    }

    protected function validateDetailModels()
    {
        $valid = true;
        foreach ( $this->detailModels as $modelId => $detailModels )
        {
            $valid = Model::validateMultiple( $detailModels ) && $valid;
            if (! $valid )
                $this->detailModelsErrors = Model::$errors;
        }

        return $valid;
    }

    protected function deleteModels( $id )
    {
        $this->model = $this->findModel( $id );
        $this->detailModels = $this->model->links();
        $messages = [];

        foreach ( $this->detailModels as $details )
        {
            // delete sibling model or one-to-one
            if ( !is_array( $details ))
            {
                // soft delete
                $details->deleted_at = date('Y-m-d H:i:s');
                $details->save(false);
                // hard delete
                // if ( $details->delete() !== false )
                //     $messages['success'][$details->id] = $details->id . ' has been deleted successfully';
                // else
                //     $messages['error'][$details->id] = $details->id . ' could not be deleted';
            }
            // delete child model or one-to-many
            foreach ( $details as $detailModel )
            {
                // soft delete
                if (property_exists($detailModel, 'deleted_at'))
                {
                    $detailModel->deleted_at = date('Y-m-d H:i:s');
                    $detailModel->save(false);
                }
                // hard delete
                // if ( $detailModel->delete() !== false )
                //     $messages['success'][$detailModel->id] = $detailModel->id . ' has been deleted successfully';
                // else
                //     $messages['error'][$detailModel->id] = $detailModel->id . ' could not be deleted';
            }
        }
        // soft delete
        $this->model->deleted_at = date('Y-m-d H:i:s');
        $this->model->save(); // false
        // hard delete
        // if ( $this->model->delete() !== false )
        // {
        //     // $messages['success'][$this->model->id] = $this->model->id . ' has been deleted permanently';
        //     Yii::$app->session->setFlash( 'success', 
        //         Yii::t('app', $this->resourceName .' '. $this->model->id . ' has been deleted permanently') );
        // }
        // else
        //     // $messages['error'][$this->model->id] = $this->model->id . ' could not be deleted';
        //     Yii::$app->session->setFlash( 'error', 
        //         Yii::t('app', $this->resourceName .' '. $this->model->id . ' could not be deleted') );
    }

    public function actionDelete( $id )
    {
        $this->deleteModels( $id );
        return $this->redirect(['index']);
    }

    public function actionDeleteMultiple()
    {
        $result = $errors = $messages = null;
        $id_list = Json::decode( Yii::$app->request->post('id_list') );

        foreach ( $id_list as $id )
        {
            $this->deleteModels( $id );
        }

        // if ( !empty( $result ) )
        //     $messages[] = $result . ' rows have been deleted.';

        // if ( !empty( $errors ) )
        //     $messages[] = $errors . ' rows could not be deleted';

        if (Yii::$app->request->isAjax)
            return $this->asJson( ['success' => true] );
        else
            return $this->redirect(['index']);
    }

    protected function findModel( $id )
    {
        if (( $this->model = $this->modelClass::findOne( $id )) !== null )
            return $this->model;

        throw new NotFoundHttpException(
                    Yii::t('app', $this->resourceName . ': #' . $id . ' was not found.')
                );
    }

    public function actionAddItem()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelClass = Yii::$app->request->get('modelClass');
            $model = new $modelClass();
            // check for additional query params in get request
            if ( !empty(Yii::$app->request->queryParams) )
                $model->attributes = Yii::$app->request->queryParams;

            if ( !empty( $model->foreignKeyAttribute() ))
                $model->{ $model->foreignKeyAttribute() } = Yii::$app->request->get( $model->foreignKeyAttribute() );

            $formView = Yii::$app->request->get('formView');
            $itemModelClass = Yii::$app->request->get('itemModelClass');
            return $this->renderPartial($formView, [
                                        'itemModelClass' => !empty($itemModelClass) ? $itemModelClass : null,
                                        'rowId' => Yii::$app->request->get('nextRowId'),
                                        'model' => $model,
                                        'formData' => null
                                    ]);
        }
        // else
        Yii::$app->end();
    }

    public function actionEditItem()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelClass = Yii::$app->request->get('modelClass');
            $modelId = Yii::$app->request->get('modelId');
            $model = $modelClass::findOne($modelId);
            if (!$model)
                $model = new $modelClass();

            $formData = Yii::$app->request->get('formData');
            $formData = ArrayHelper::map($formData, 'name', 'value');
            $formView = Yii::$app->request->get('formView');
            return $this->renderAjax($formView, [
                        'model' => $model,
                        'modelClass' => StringHelper::basename($modelClass),
                        'formData' => $formData,
                        'rowId' => trim(Yii::$app->request->get('rowId')),
                    ]);
        }
        // else
        Yii::$app->end();
    }

    public function actionDeleteItem()
    {
        if ( Yii::$app->request->isAjax )
        {
            $modelClass = $this->modelClass . Yii::$app->request->post('modelType');
            $model = $modelClass::findOne(Yii::$app->request->post('modelId'));
            if ( !$model )
                return Json::encode(['exists' => false]);

            if ($model->delete() > 0)
            {
                // if ( $model->allowFileUpload() && isset( $model->{ $model->fileAttribute } ))
                //     $files = explode(',', $model->{ $model->fileAttribute });
                //     if ( !empty($files) )
                //         if ( is_array( $files ))
                //             foreach ( $files as $file )
                //                 FileHelper::unlink( Yii::getAlias('@webroot/uploads/') . $file );
                //         else
                //             FileHelper::unlink( Yii::getAlias('@webroot/uploads/') . $this->model->{ $model->fileAttribute } );
                // Yii session success message
                return Json::encode(['succeeded' => true]);
            }
            // Yii session failed message
            return Json::encode(['failed' => true]);
        }
        // else
        Yii::$app->end();
    }

    private function autoSuggestId( $filters = [] )
    {
        $query = $this->modelClass::find();
        if ( !empty( $filters ))
            $query->where( $filters );
        $count = $query->count();
        return $count += 1;
    }

    public function actionAutoSuggestId()
    {
        if (Yii::$app->request->isAjax)
        {
            $this->model = new $this->modelClass();
            return $this->model->autoSuggestId();
        }
        // else
        Yii::$app->end();
    }

    protected function uploadAttachments( &$model, $index )
    {
        $model->uploadForm->file_uploads = UploadedFile::getInstances(
                                            $model->uploadForm, "[$index]file_uploads"
                                        );
        if ( $model->uploadForm->file_uploads )
            return $model->uploadForm->uploads(); // fileNames

        return false;
    }
}
