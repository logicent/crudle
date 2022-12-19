<?php

namespace crudle\app\reporting;

use crudle\app\Module as AppModule;
use Yii;

/**
 * reporting module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Report';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\reporting\controllers';

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
        // Standard/custom reports routes
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => $this->urlRule, 'pattern' => 'app/reports', 'route' => $this->id . '/viewer/index'],
                ['class' => $this->urlRule, 'pattern' => 'app/report/builder', 'route' => $this->id . '/builder/index'],
                ['class' => $this->urlRule, 'pattern' => 'app/report/template', 'route' => $this->id . '/template/index'],
                // ['class' => $this->urlRule, 'pattern' => 'app/query-report/<\w+>' , 'route' => $this->id . '/report/query/<\w+>'],
            ], false);
        }
    }
}
