<?php

namespace crudle\app\main\controllers;

use crudle\app\enums\Status_Active;
use crudle\app\main\controllers\base\BaseViewController;
use crudle\app\main\enums\Type_View;
use crudle\app\main\models\auth\LoginForm;
use crudle\app\main\models\auth\PasswordResetRequestForm;
use crudle\app\main\models\auth\ResetPasswordForm;
use crudle\app\main\models\auth\Auth;
use crudle\app\main\models\auth\User;
use crudle\app\main\models\auth\UserLog;
use crudle\app\setup\models\EmailQueue;
use crudle\app\setup\models\Setup;
use crudle\app\setup\models\SmtpSettingsForm;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AppController extends BaseViewController
{
    public $layout = '@appMain/views/_layouts/site';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'login', 'logout', 'request-password-reset', 'reset-password'],
                'rules' => [
                    [
                        'actions' => ['index', 'login', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest)
            return $this->redirect(['login']);
        // else
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            $userLog = new UserLog();
            $userLog->user_id = Yii::$app->user->id;
            $userLog->login_ip = Yii::$app->request->userIP;
            $userLog->login_at = time();
            $userLog->status = Status_Active::Yes;
            $userLog->save(false);

            // return $this->goBack();
            return $this->redirect(['/app/home']);
        }

        $model->password = ''; // clear the password

        return $this->render('auth', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        $userLog = new UserLog();
        $userLog->user_id = Yii::$app->user->id;
        $userLog->logout_ip = Yii::$app->request->userIP;
        $userLog->logout_at = time();
        $userLog->status = Status_Active::No;
        $userLog->save(false);

        // Yii::$app->cache->flush(); // Clear all cache here
        Yii::$app->user->logout();

        return $this->goHome();
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

                    if ($this->sendMail($msg)) {
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

    public function sendMail($msg, $from_support = false, $addAttachments = NULL)
    {
        $mailer = $this->getMailer();

        $message = $mailer->compose()
                        ->setFrom($msg->from)
                        ->setTo($msg->to)
                        ->setSubject($msg->subject)
                        ->setHtmlBody($msg->message);
        try {  
            $mailer->send($message);
        }
        catch (\Swift_SwiftException $e) {
            // display error encountered
            echo $e->getMessage();
        }
    }

    public function getMailer()
    {
        $model = Setup::getSettings(SmtpSettingsForm::class);

        $config = [
                    'class' => 'yii\swiftmailer\Mailer',
                    'viewPath' => '@appMain/views/_mail',
                    'useFileTransport' => false,
                    'transport' => [
                        'class' => 'Swift_SmtpTransport',
                        'host' => $model->smtp_host,
                        'username' => $model->smtp_username,
                        'password' => $model->smtp_password,
                        'port' => $model->smtp_port,
                        'encryption' => $model->smtp_encryption,
                    ],
                ];

        return Yii::createObject($config);
    }

    // public function pageNavbar(): string
    // {
    //     return $this->layout . '/_navbar';
    // }

    public function defaultActionViewType()
    {
        return Type_View::Workspace;
    }

    public function showViewHeader(): bool
    {
        return false;
    }
}