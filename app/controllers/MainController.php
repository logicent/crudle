<?php

namespace app\controllers;

use yii\filters\AccessControl;

class MainController extends \app\controllers\base\BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'user-manual', 'about', 'support-ticket'],
                'rules' => [
                    [
                        'actions' => ['index', 'user-manual', 'about', 'support-ticket'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $stats = [];

        return $this->render('index', [
            'stats' => $stats
        ]);
    }

    public function actionUserManual()
    {
        return $this->render('help');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
