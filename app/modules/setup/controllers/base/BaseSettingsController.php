<?php

namespace crudle\setup\controllers\base;

use app\helpers\App;
use crudle\main\controllers\base\BaseFormController;
use crudle\main\enums\Type_Form_View;
use crudle\main\enums\Type_View;
use crudle\setup\models\Settings;
use crudle\setup\models\Setup;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\StringHelper;


abstract class BaseSettingsController extends BaseFormController
{
    public function actionIndex()
    {
        $this->model = Setup::getSettings( $this->modelClass() );
        // load related settings models
        foreach ($this->model::relations() as $relationAttribute => $relationSettings)
            $this->detailModels[$relationAttribute] = 
            App::convertArraysToModels($relationSettings['class'], $this->model->$relationAttribute);

        if ( $this->model->load( Yii::$app->request->post() ))
        {
            foreach ($this->model::relations() as $relationAttribute => $relationSettings)
            {
                $relationClassname = StringHelper::basename($relationSettings['class']);
                if (isset(Yii::$app->request->post()[$relationClassname]))
                    $this->model->$relationAttribute = Yii::$app->request->post()[$relationClassname];
                else
                    $this->model->$relationAttribute = null;

                App::convertArrayToJson($this->model, $relationAttribute);
            }
            $modelClassname = StringHelper::basename( $this->modelClass() );
            if ( $this->model->validate() && $this->model->save( $modelClassname ))
            {
                $successMsg = $this->name . ' saved successfully';
                Yii::$app->session->setFlash('success',
                    Yii::t('app', '{successMsg}', ['successMsg' => $successMsg]));

                if ( Yii::$app->request->isAjax )
                    return $this->asJson([ 'success' => true ]);
                else
                    return $this->redirectTo();
            }
            else {
                $result = [];
                foreach ( $this->model->getErrors() as $attribute => $errors )
                    $result[ Html::getInputId( $this->model, $attribute ) ] = $errors;

                if ( Yii::$app->request->isAjax )
                    return $this->asJson( ['validation' => $result] );
            }
        }

        return $this->render('@app_setup/views/_settings/index');
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

            $formView = Yii::$app->request->get('formView');

            return $this->renderPartial($formView, [
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
            $model = new $modelClass();

            $rowData = Yii::$app->request->get('rowData');
            $fields = ArrayHelper::map($rowData, 'name', 'value');
            // populate model with inline field values
            $model->attributes = $fields;

            $rowId = Yii::$app->request->get('rowId');
            $editView = Yii::$app->request->get('editView');
            return $this->renderAjax($editView, [
                        'model' => $model,
                        'rowId' => $rowId,
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

    // FormInterface
    public function redirectTo(string $action = null)
    {
        return $this->redirect([ '/setup' ]);
    }

    // LayoutInterface
    public function currentViewType()
    {
        return Type_View::Form;
    }

    public function formViewType()
    {
        return Type_Form_View::Single;
    }
}