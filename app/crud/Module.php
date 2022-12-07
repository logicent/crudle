<?php

namespace crudle\app\crud;

use Yii;

/**
 * crud module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\crud\controllers';

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
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/<module>/<controller>/New', 'route' => $this->id . '/<controller>/create'],
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/<module>/<controller>/<id:\w+>', 'route' => $this->id . '/<controller>/read'],
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/<module>/<controller>/<id:\w+>', 'route' => $this->id . '/<controller>/update'],
            ], false);
        }
    }
}
