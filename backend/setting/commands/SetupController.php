<?php
namespace crudle\app\setting\commands;

use yii\console\Controller;

class SetupController extends Controller
{
    public function init()
    {
        // Check if prerequisites are installed locally or just ask the user to install them
        // - Git
        // - Composer
        // - NPM

        // - Clone the github repo `git@github.com:logicent/yii2-crudle.git && cd yii2-crudle`

        // - Run `composer install`

        // "ln -sf bower-asset vendor/bower"

        // - Run `npm install -g bower && npm install -g bower-npm-resolver`

        // - Run `bower install`

        // - Create a database and update your `.env` settings

        // - Run `./yii migrate --migration-path 'app/database/migrations'`

        // - Run `cat app/database/seeds/people.sql | mysql -u your_root_user -p your_db_name`

        // - Run `./yii user/create-superuser "my_password"` and `./yii rbac/init`
    }

    public function actionDeployStatus($env)
    {
        return $env;
    }
}
