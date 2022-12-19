<?php

namespace crudle\app\dashboard;

use crudle\app\Module as AppModule;
use Yii;

/**
 * dashboard module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Dashboard';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\dashboard\controllers';

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
                ['class' => $this->urlRule, 'pattern' => 'app/dashboards' , 'route' => $this->id . '/visualize/index'],
            ], false);
        }
    }
}
