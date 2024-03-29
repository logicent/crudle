<?php

namespace crudle\ext\web_cms\controllers\site;

use crudle\app\main\controllers\AppController;
use crudle\ext\web_cms\models\ContactForm;
use Yii;

class SiteController extends AppController
{
    public $layout = '@extModules/web_cms/layouts/site';

    public function beforeAction($action)
    {
        // override app login check
        return true;
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

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}