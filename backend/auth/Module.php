<?php

namespace crudle\app\auth;

use crudle\app\Module as AppModule;
use Yii;

/**
 * auth module definition class
 */
class Module extends AppModule
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
        Yii::configure($this, require __DIR__ . '/config.php');
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => $this->urlRule, 'pattern' => 'app/login', 'route' => $this->id . '/login/login'],
                ['class' => $this->urlRule, 'pattern' => 'app/logout', 'route' => $this->id . '/logout/logout'],
                ['class' => $this->urlRule, 'pattern' => 'app/forgot-password', 'route' => $this->id . '/request-password-reset/request-password-reset'],
                ['class' => $this->urlRule, 'pattern' => 'app/reset-password', 'route' => $this->id . '/reset-password/reset-password'],
            ], false);
        }
    }
}
