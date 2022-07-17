<?php

namespace crudle\app\main\controllers\base;

use crudle\app\helpers\Uploader;
use crudle\app\main\controllers\action\AddRow;
use crudle\app\main\controllers\action\Amend;
use crudle\app\main\controllers\action\AutoSuggestId;
use crudle\app\main\controllers\action\Cancel;
use crudle\app\main\controllers\action\Create;
use crudle\app\main\controllers\action\DeleteMany;
use crudle\app\main\controllers\action\DeleteRow;
use crudle\app\main\controllers\action\EditRow;
use crudle\app\main\controllers\action\FindItem;
use crudle\app\main\controllers\action\Index;
use crudle\app\main\controllers\action\LoadAttributesByModel;
use crudle\app\main\controllers\action\LoadModelsByModule;
use crudle\app\main\controllers\action\Read;
use crudle\app\main\controllers\action\SaveComment;
use crudle\app\main\controllers\action\ShowCommentModal;
use crudle\app\main\controllers\action\ShowRelatedText;
use crudle\app\main\controllers\action\Submit;
use crudle\app\main\controllers\action\Update;
use crudle\app\main\controllers\action\UpdateStatus;
use crudle\app\main\enums\Type_Comment;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_Relation;
use crudle\app\main\enums\Type_View;
use crudle\app\main\models\CommentForm;
use crudle\app\main\models\Model;
use crudle\app\setup\enums\Type_Permission;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

abstract class BaseCrudController extends BaseViewController implements CrudInterface
{
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
                        // 'roles' => [ Type_Permission::List .' '. $this->viewName() ],
                    ],
                    [
                        'actions' => ['read'], // view
                        'allow' => true,
                        // 'roles' => [ Type_Permission::Read .' '. $this->viewName() ],
                    ],
                    [
                        'actions' => ['update'], // edit
                        'allow' => true,
                        // 'roles' => [ Type_Permission::Update .' '. $this->viewName() ],
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
                        // 'roles' => [ Type_Permission::Create .' '. $this->viewName() ],
                    ],
                    [
                        'actions' => ['delete', 'delete-many'],
                        'allow' => true,
                        // 'roles' => [ Type_Permission::Delete .' '. $this->viewName() ],
                    ],
                    [
                        'actions' => ['cancel'],
                        'allow' => true,
                        // 'roles' => [ Type_Permission::Cancel .' '. $this->viewName() ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'delete-many' => ['POST'],
                    'cancel' => ['POST'],
                ],
            ],
        ];
    }

    public function showQuickEntry(): bool
    {
        return false;
    }

    public function formViewType()
    {
        return Type_Form_View::Multiple;
    }

    public function showLinkedData(): bool
    {
        return true;
    }

    public function showComments(): bool
    {
        return true;
    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'read'          => Read::class,
            'create'        => Create::class,
            'update'        => Update::class,
            'submit'        => Submit::class,
            'cancel'        => Cancel::class,
            'amend'         => Amend::class,
            'delete'        => Delete::class,
            'delete-many'   => DeleteMany::class,
            'add-row'       => AddRow::class,
            'edit-row'      => EditRow::class,
            'find-item'      => FindItem::class,
            'delete-row'        => DeleteRow::class,
            'auto-suggest-id'   => AutoSuggestId::class,
            'delete-many'           => DeleteMany::class,
            'save-comment'          => SaveComment::class,
            'show-comment-modal'    => ShowCommentModal::class,
            'show-related-text'     => ShowRelatedText::class,
            'load-models-by-module'     => LoadModelsByModule::class,
            'load-attributes-by-model'  => LoadAttributesByModel::class,
            'update-status'         => UpdateStatus::class,
        ]);
    }

    public function saveModel()
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
                $filePath = Uploader::getFile( $this->model );
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
                        $flashMsg = $this->viewName() . ' : #' . $this->model->id .' '. 'was saved successfully';
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
                        $flashMsg = $this->viewName() . ' : ' . 'could not be saved';
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

                    if (!empty($this->validationErrors))
                        array_push( $result, $this->validationErrors );
                    return $this->asJson([ 'validation' => $result ]);
                }
                // else
                Yii::$app->session->setFlash( 'errors', $this->model->errors );
                if (!empty($this->validationErrors))
                    Yii::$app->session->setFlash( 'errors', $this->validationErrors );
            }
        }
        // nothing happened go back
        return $this->loadView();
    }

    public function loadView()
    {
        // 1. load default values for form
        $this->model->loadDefaultValues();
        // !! To-Do: implement $this->loadDetailModelsDefaultValues();

        // 2. render view by request type and action id
        $data = [
            'model' => $this->model,
            'modelDetails' => $this->detailModels,
        ];
        if ( Yii::$app->request->isAjax )
            return $this->renderAjax( $this->formView(), $data );
        // else
        return $this->render( $this->formView(), $data );
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
                    $fileNames = Uploader::getFiles( $detailModel, $i );
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
                $this->validationErrors = Model::$errors;
        }

        return $valid;
    }

    protected function findModel( $id )
    {
        $modelClass = $this->modelClass();
        if (( $this->model = $modelClass::findOne( $id )) !== null )
            return $this->model;

        throw new NotFoundHttpException(
                    Yii::t('app', $this->viewName() . ': #' . $id . ' was not found.')
                );
    }

    private function autoSuggestId( $filters = [] )
    {
        $query = $this->modelClass::find();
        if ( !empty( $filters ))
            $query->where( $filters );
        $count = $query->count();
        return $count += 1;
    }

    // ViewInterface
    public function defaultActionViewType()
    {
        return Type_View::List;
    }

    // CrudInterface
    public function redirectOnCreate()
    {
        return $this->redirect(['update']);
    }

    public function viewCreated(): bool
    {
        return false;
    }

    public function redirectOnUpdate()
    {
        return $this->redirect(['index']);
    }

    public function viewUpdated(): bool
    {
        return false;
    }

    public function redirectOnDelete()
    {
        return $this->redirect(['index']);
    }

    public function linkedModels(): array
    {
        return [];
    }

    public function isReadonly(): bool
    {
        return $this->action->id == 'read';
    }

    public function formView(string $action = null, string $path = null)
    {
        return '@appMain/views/crud/index';
    }

    public function commentView(): string
    {
        return '@appMain/views/_layouts/_comments';
    }
}
