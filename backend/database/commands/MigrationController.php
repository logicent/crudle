<?php

namespace crudle\app\database\commands;

use yii\console\Controller;

class MigrationController extends Controller
{
    public function actionInstall()
    {
        // fetch migrations from app and ext modules
        // run safeUp on all
    }

    public function actionUninstall()
    {
        // fetch migrations from app and ext modules
        // run safeDown on all
    }
}
