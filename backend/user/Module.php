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
        // if (Yii::$app instanceof \yii\console\Application) {
        //     $this->controllerMap[$this->id] = [
        //         'class'  => 'crudle\app\user\commands\RbacController',
        //         'module' => $this
        //     ];
        //     $this->controllerNamespace = 'crudle\app\user\commands';
        // }
        Yii::configure($this, require __DIR__ . '/config.php');
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        // if ($app instanceof \yii\console\Application) {
        //     $app->controllerMap[$this->id] = [
        //         'class'  => 'crudle\app\user\commands\RbacController',
        //         'module' => $this
        //     ];
        //     // $app->getModule('user')->controllerNamespace = 'crudle\app\user\commands';
        //     // $this->controllerNamespace = 'crudle\app\user\commands';
        // }
        // ** Crud action routes
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
            ], false);
        }
    }
}
