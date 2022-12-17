<?php

namespace crudle\app\auth\controllers;

use crudle\app\main\enums\Status_Active;
use crudle\app\main\controllers\AppController;
use crudle\app\user\models\UserLog;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class LogoutController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
}