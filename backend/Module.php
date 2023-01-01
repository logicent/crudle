<?php

namespace crudle\app;

use Yii;
use yii\base\BootstrapInterface;

/**
 * any module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public $moduleName;
    public $isInstalled; // if db migrations have run
    public $isActivated = true; // will be loaded in app run
    // public $activationRule = [];
    // public $isTranslatable; // if translation resource exists
    public $urlRule = 'yii\web\UrlRule';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                // 
            ], false);
        }
        // elseif ($app instanceof \yii\console\Application) {
        //     $app->controllerMap[$this->id] = [
        //         'class' => "crudle\{$this->id}\console\SiteController",
        //         'module' => $this,
        //     ];
        // }
    }
}
