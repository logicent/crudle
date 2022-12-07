<?php

namespace crudle\app\auth\controllers;

use crudle\app\helpers\Mailer;
use crudle\app\main\controllers\AppController;
use crudle\app\auth\forms\PasswordResetRequestForm;
use crudle\app\main\models\auth\Auth;
use crudle\app\auth\models\User;
use crudle\app\email\models\EmailQueue;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class RequestPasswordResetController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['request-password-reset'],
                'rules' => [
                    [
                        'actions' => ['request-password-reset'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['request-password-reset'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'request-password-reset' => ['post'],
                ],
            ],
        ];
    }

    public function actionRequestPasswordReset()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $user = Auth::findOne([
                'status' => User::STATUS_ACTIVE,
                'email' => $model->email,
            ]);

            if ($user) {
                if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                    $user->generatePasswordResetToken();
                }

                if ($user->save(false))
                {
                    $msg = new EmailQueue();
                    $msg->from = Yii::$app->params['supportEmail'];
                    $msg->to = $model->email;
                    $msg->subject = Yii::t('app', 'Reset Password Request');

                    $salutation = Yii::t('app', 'Hello') . ' ' . Html::encode($user->username) . ',';
                    $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['reset-password', 'token' => $user->password_reset_token]);

                    $msg->message = Html::tag('p', $salutation);
                    $msg->message .= Html::tag('p', $resetLink);

                    if (Mailer::send($msg)) {
                        Yii::$app->session->setFlash('success', Yii::t('app', Html::encode('Check your email for further instructions.')));
                        return $this->goHome();
                    }
                }
            }
            else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('auth', [
            'model' => $model,
        ]);
    }
}