<?php

namespace app\controllers;

use app\enums\Status_Active;
use app\models\auth\LoginForm;
use app\models\auth\PasswordResetRequestForm;
use app\models\auth\ResetPasswordForm;
use app\models\auth\Auth;
use app\models\auth\User;
use app\models\auth\UserLog;
use app\modules\setup\models\EmailQueue;
use app\modules\setup\models\Setup;
use app\modules\setup\models\SmtpSettingsForm;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SiteController extends Controller
{
    public $layout = 'site';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'login', 'logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'login'],
                        'allow' => true,
                        'roles' => ['?'],
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
        return $this->redirect(['login']);
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

            return $this->goBack();
        }

        $model->password = ''; // clear the password

        return $this->render('index', [
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

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
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

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function sendMail($msg)
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
                    'viewPath' => '@app/views/_mail',
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
}