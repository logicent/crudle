<?php

namespace crudle\app\email;

use crudle\app\Module as AppModule;
use Yii;

/**
 * email module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Email';

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
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
