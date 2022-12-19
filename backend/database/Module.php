<?php

namespace crudle\app\database;

use crudle\app\Module as AppModule;
use Yii;

/**
 * database module definition class
 */
class Module extends AppModule
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
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
