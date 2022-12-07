<?php

namespace crudle\app\workspace;

use Yii;

/**
 * workspace module definition class
 */
class Module extends \yii\base\Module
{
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
                ['class' => 'yii\web\UrlRule', 'pattern' => 'app/home' , 'route' => $this->id . '/home/index'],
            ], false);
        }
    }
}
