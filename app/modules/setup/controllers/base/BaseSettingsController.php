<?php

namespace app\modules\setup\controllers\base;

use app\modules\main\controllers\base\BaseFormController;
use app\modules\main\enums\Type_Form_View;
use app\modules\main\enums\Type_View;
use app\modules\setup\models\Setup;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
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
                Yii::$app->session->setFlash('success',
                    Yii::t('app', 'Settings were saved successfully'));

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
