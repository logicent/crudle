<?php

namespace crudle\main;

use Yii;

/**
 * main module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\main\controllers';

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
