<?php
namespace app\commands;

use yii\console\Controller;

class SetupController extends Controller
{
    public function init()
    {
        // Check if prerequisites are installed locally or just ask the user to install them
        // - Git
        // - Composer
        // - NPM

        // - Clone the github repo `git@github.com:mwaigichuhi/ajabu-pos.git && cd ajabu-pos`

        // - Run `composer install`

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
