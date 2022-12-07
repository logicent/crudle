<?php

namespace crudle\app\auth\controllers;

use crudle\app\main\controllers\AppController;
use crudle\app\auth\forms\ResetPasswordForm;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ResetPasswordController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['reset-password'],
                'rules' => [
                    [
                        'actions' => ['reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['reset-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'reset-password' => ['post'],
                ],
            ],
        ];
    }

    public function actionResetPassword($token)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        try {
            $model = new ResetPasswordForm($token);
        }
        catch (\Exception $e)
        {
            throw new \yii\web\BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword())
        {
            Yii::$app->session->setFlash('success', Yii::t('app', Html::encode("Your new password was saved successfully.")));
            return $this->goHome();
        }

        return $this->render('auth', [
            'model' => $model,
        ]);
    }
}