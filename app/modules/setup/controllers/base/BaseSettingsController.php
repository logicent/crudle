<?php

namespace app\modules\setup\controllers\base;

use app\modules\main\controllers\base\BaseFormController;
use app\modules\main\enums\Type_Form_View;
use app\modules\main\enums\Type_View;
use app\modules\setup\models\Setup;
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
        $modelClassname = StringHelper::basename( $this->modelClass() );

        if ( $this->model->load( Yii::$app->request->post() ))
        {
            if ( $this->model->validate() && $this->model->save( $modelClassname ))
            {
                $successMsg = $this->name . ' saved successfully';
                Yii::$app->session->setFlash('success',
                    Yii::t('app', '{successMsg}', ['successMsg' => $successMsg]));

                if ( Yii::$app->request->isAjax )
                    return $this->asJson([ 'success' => true ]);
                else
                    return $this->redirect([ '/setup' ]);
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
            $modelId = Yii::$app->request->get('modelId');
            // find in Json and map to Model instance
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