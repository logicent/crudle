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
}
