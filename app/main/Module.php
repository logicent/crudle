<?php

namespace crudle\app\main;

use crudle\ext\Module as ExtModule;
use Yii;

/**
 * main module definition class
 */
class Module extends ExtModule
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
        // custom initialization code goes here
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
