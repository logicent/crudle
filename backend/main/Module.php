<?php

namespace crudle\app\main;

use crudle\app\Module as AppModule;
use Yii;

/**
 * main module definition class
 */
class Module extends AppModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\main\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config.php');
    }

    // 'app' => 'main/app/index', // defaultRoute requires this rule
}
