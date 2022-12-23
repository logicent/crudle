<?php

namespace crudle\app\user;

use crudle\app\Module as AppModule;
use Yii;

/**
 * user module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'User';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\user\controllers';

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
        // ** Crud action routes
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
            ], false);
        }
    }
}
