<?php

namespace crudle\app\crud;

use crudle\app\Module as AppModule;

/**
 * crud module definition class
 */
class Module extends AppModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\crud\controllers';

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        // ** Crud action routes
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => $this->urlRule, 'pattern' => 'app/<module>/<controller>/New', 'route' => $this->id . '/<controller>/create'],
                ['class' => $this->urlRule, 'pattern' => 'app/<module>/<controller>/<id:\w+>', 'route' => $this->id . '/<controller>/read'],
                ['class' => $this->urlRule, 'pattern' => 'app/<module>/<controller>/<id:\w+>', 'route' => $this->id . '/<controller>/update'],
            ], false);
        }
    }
}
