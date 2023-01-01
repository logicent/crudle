<?php

namespace crudle\app\database;

use crudle\app\Module as AppModule;
use Yii;

/**
 * database module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Database';

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

        if (Yii::$app->getRequest()->getIsConsoleRequest()) {
            $this->controllerMap['data-model'] = 'crudle\app\database\commands\DataModelController';
            $this->controllerMap['db'] = 'crudle\app\database\commands\DbController';
            $this->controllerMap['migration'] = 'crudle\app\database\commands\MigrationController';
        }
    }
}
