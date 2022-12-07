<?php

namespace crudle\ext\report;

use crudle\ext\Module as ExtModule;
use Yii;

/**
 * report module definition class
 */
class Module extends ExtModule
{
    public $moduleName = 'Report';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\report\controllers';

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
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/reports' , 'route' => $this->id . '/reports/index'],
            ], false);
        }
    }
}
