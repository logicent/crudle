<?php

namespace crudle\app\workspace;

use crudle\app\Module as AppModule;
use Yii;

/**
 * workspace module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Workspace';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\workspace\controllers';

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
                ['class' => $this->urlRule, 'pattern' => 'app/home' , 'route' => $this->id . '/home/index'],
            ], false);
        }
    }
}
