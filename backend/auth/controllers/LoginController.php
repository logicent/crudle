<?php

namespace crudle\app\auth\controllers;

use crudle\app\auth\forms\LoginForm;
use crudle\app\main\controllers\AppController;
use crudle\app\main\enums\Status_Active;
use crudle\app\user\models\UserLog;
use Yii;
use yii\filters\AccessControl;

class LoginController extends AppController
{
    public $layout = '@appMain/layouts/site';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            UserLog::makeEntry(Status_Active::Yes);
            // return $this->goBack();
            return $this->redirect(['/app/home']);
        }

        $model->password = ''; // clear the password

        return $this->render('/_form/index', [
            'model' => $model,
        ]);
    }
}