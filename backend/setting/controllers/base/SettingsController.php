<?php

namespace crudle\app\setting\controllers\base;

use crudle\app\main\helpers\App;
use crudle\app\main\controllers\base\FormController;
use crudle\app\main\enums\Type_Form_View;
use crudle\app\main\enums\Type_View;
use crudle\app\setting\models\Settings;
use crudle\app\setting\models\Setup;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\StringHelper;

abstract class SettingsController extends FormController
{
    public function actions()
    {
        return [
        ];
    }

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

        return $this->render('@appSetup/views/_settings/index');
    }

    public function actionAddRow()
    {
        if (Yii::$app->request->isAjax) // !! isAjax won't work in Htmx use isPost or check headers (HX-Request).
        {
            $modelClass = Yii::$app->request->get('_model_class');
            $model = new $modelClass();
            // check for additional query params in get request
            if (!empty(Yii::$app->request->queryParams))
                $model->attributes = Yii::$app->request->queryParams;

            $rowInputsView = Yii::$app->request->get('_row_inputs');
            return $this->renderPartial($rowInputsView, [
                'rowId' => (int) Yii::$app->request->get('_row_counter') + 1,
                'model' => $model,
                'modelClass' => $modelClass,
            ]);
        }
        // else
        Yii::$app->end();
    }

    public function actionEditRow()
    {
        if (Yii::$app->request->isAjax) // !! isAjax won't work in Htmx use isPost or check headers (HX-Request).
        {
            $modelClass = Yii::$app->request->post('_model_class');
            $model = new $modelClass();

            $rowData = ArrayHelper::map(
                Yii::$app->request->post('_row_values'),
                'name',
                'value'
            );
            $rowId = Yii::$app->request->post('_row_counter');
            $prefix = strlen("{$model->formName()}[$rowId]");
            $formData = [];
            foreach ($rowData as $name => $value) {
                $key = substr($name, $prefix);
                $key = trim($key, '[]');
                $formData[$key] = $value;
            }
            $model->setAttributes($formData);
            $modalFormView = Yii::$app->request->post('_modal_form');
            return $this->renderAjax($modalFormView, [
                'model' => $model,
                'rowId' => $rowId,
            ]);
        }
        // else
        Yii::$app->end();
    }

    public function actionDeleteRow()
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

    // ViewInterface
    public function redirectTo(string $action = null)
    {
        return $this->redirect([ '/setup' ]);
    }

    public function defaultActionViewType()
    {
        return Type_View::Form;
    }

    public function formViewType()
    {
        return Type_Form_View::Single;
    }

    public function isReadonly()
    {
        return $this->action->id == 'read';
    }
}