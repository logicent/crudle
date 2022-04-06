<?php

namespace app\modules\main\models\auth;

use Yii;
use yii\helpers\Html;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends \yii\base\Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\app\modules\main\models\auth\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                try {
                    return Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['appName'] .'--'. Yii::t('app', 'Support')])
                        ->setTo($this->email)
                        ->setSubject(Yii::$app->params['appName'] .'--'. Yii::t('app', 'Reset Password Request'))
                        ->send();
                }
                catch (\Swift_TransportException $e)
                {
                      Yii::$app->getSession()->setFlash('error', [
                        'type' => 'error',
                        'duration' => Yii::$app->params['flashMessageDuration'],
                        'icon' => 'fa fa-envelope',
                        'message' => $e->getMessage(), //Yii::t('app', Html::encode('Mail not sent! Connection could not be established with host SMTP server.')),
                        'title' => Yii::t('app', Html::encode('Mail Exception')),
                        'positonY' => Yii::$app->params['flashMessagePositionY'],
                        'positonX' => Yii::$app->params['flashMessagePositionX']
                    ]);
                }
            }
        }

        return false;
    }
}
