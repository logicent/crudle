<?php

namespace crudle\app\printing;

use crudle\app\Module as AppModule;
use Yii;

/**
 * printing module definition class
 */
class Module extends AppModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\app\printing\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
