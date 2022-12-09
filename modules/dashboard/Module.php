<?php

namespace crudle\ext\dashboard;

use crudle\ext\Module as ExtModule;
use Yii;

/**
 * dashboard module definition class
 */
class Module extends ExtModule
{
    public $moduleName = 'Dashboard';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\ext\dashboard\controllers';

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
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/dashboards' , 'route' => $this->id . '/visualize/index'],
            ], false);
        }
    }
}
