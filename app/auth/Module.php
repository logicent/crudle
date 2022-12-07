<?php

namespace crudle\app\auth;

use Yii;

/**
 * auth module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\auth\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        Yii::configure($this, require __DIR__ . '/config.php');
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/login', 'route' => $this->id . '/login/login'],
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/logout', 'route' => $this->id . '/logout/logout'],
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/forgot-password', 'route' => $this->id . '/request-password-reset/request-password-reset'],
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/reset-password', 'route' => $this->id . '/reset-password/reset-password'],
            ], false);
        }
    }
}
