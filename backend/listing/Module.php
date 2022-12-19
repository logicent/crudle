<?php

namespace crudle\app\listing;

use crudle\app\Module as AppModule;
use Yii;

/**
 * listing module definition class
 */
class Module extends AppModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\listing\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
