<?php

namespace crudle\app\main\controllers\base;

use crudle\app\main\controllers\action\ResendNotification;
use crudle\app\main\controllers\action\ResendNotifications;
use crudle\app\main\controllers\action\StoreUserPreferences;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    protected $model;

    public function actions()
    {
        return [
            'resend-notification'   => ResendNotification::class,
            'resend-notifications'  => ResendNotifications::class,
            'store-user-preferences'    => StoreUserPreferences::class,
        ];
    }

    public function refresh($anchor = '')
    {
        // stop executing this action and refresh the current page
        return $this->refresh();
    }

    // public function afterAction($action, $result)
    // {
    //     $result = parent::afterAction($action, $result);
    //     // your custom code here
    //     // Yii::$app->response->statusCode = 200;
    //     // get URLs for back button - not working perhaps use a cache of links
    //         // Do this for all actionIndex
    //     return $result;
    // }
}
