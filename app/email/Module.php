<?php

namespace crudle\app\email;

use crudle\ext\Module as ExtModule;
use Yii;

/**
 * email module definition class
 */
class Module extends ExtModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\email\controllers';

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
