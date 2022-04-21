<?php

namespace crudle\setup;

use Yii;

/**
 * setup module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\setup\controllers';

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
