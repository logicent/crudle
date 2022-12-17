<?php

namespace crudle\app\database;

use crudle\ext\Module as ExtModule;
use Yii;

/**
 * database module definition class
 */
class Module extends ExtModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\database\controllers';

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
