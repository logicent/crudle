<?php

namespace app\modules\setup\controllers\base;

use app\controllers\base\BaseController;
use app\enums\Type_Form_View;
use app\modules\setup\models\Setup;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

abstract class BaseSettingsController extends BaseController
{
    public $formViewType = Type_Form_View::Single;

    public function init()
    {
        parent::init();
        $this->viewPath = Yii::getAlias('@app_setup/views/') . Inflector::underscore(
            Inflector::id2camel($this->id)
        );
        // return;
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Setup::getSettings( $this->modelClass );
        $modelClassname = StringHelper::basename( $this->modelClass );

        if ( $model->load( Yii::$app->request->post() ))
        {
            if ( $model->validate() && $model->save( $modelClassname ))
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
                foreach ( $model->getErrors() as $attribute => $errors )
                    $result[ Html::getInputId( $model, $attribute ) ] = $errors;

                if ( Yii::$app->request->isAjax )
                    return $this->asJson( ['validation' => $result] );
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
