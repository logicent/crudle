<?php

namespace crudle\app\setting;

use crudle\app\Module as AppModule;
use Yii;

/**
 * setting module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Setup';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\setting\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config.php');

        if (Yii::$app->getRequest()->getIsConsoleRequest()) {
            $this->controllerMap['setup'] = 'crudle\app\setting\commands\SetupController';
        }

    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => $this->urlRule, 'pattern' => 'app/setup', 'route' => $this->id . '/setting/index'],
            ], false);
        }
    }
}
