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
    public $controllerNamespace = 'crudle\ext\report\controllers';

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
        // Standard/custom reports routes
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/reports' , 'route' => $this->id . '/reports/index'],
                // ['class' => 'yii\web\UrlRule', 'pattern' => 'app/query-report/<\w+>' , 'route' => $this->id . '/report/query/<\w+>'],
            ], false);
        }
    }
}
