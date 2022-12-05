<?php

namespace crudle\app\setup\commands\base;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use yii\helpers\Inflector;
use yii\console\ExitCode;
use Faker\Factory;
use crudle\app\setup\models\User;
use crudle\ext\web_cms\enums\Status_Article;
use crudle\ext\web_cms\models\BlogArticle;
use crudle\ext\web_cms\models\BlogCategory;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class BaseAppController extends Controller
{
    /** @var array */
    public $writablePaths = [
        '@storage/runtime',
        '@crudle/web/assets',
    ];

    /** @var array */
    public $executablePaths = [
        '@crudle/crudle',
    ];

    /** @var array */
    public $generateKeysPaths = [
        '@crudle/.env'
    ];

    /**
     * Sets given keys to .env file
     */
    public function actionSetKeys()
    {
        $this->setKeys($this->generateKeysPaths);
    }

    /**
     * @throws \yii\base\InvalidRouteException
     * @throws \yii\console\Exception
     */
    public function actionSetup()
    {
        $this->runAction('set-writable', ['interactive' => $this->interactive]);
        $this->runAction('set-executable', ['interactive' => $this->interactive]);
        $this->runAction('set-keys', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('rbac-migrate/up', ['interactive' => $this->interactive]);
    }

    /**
     * Truncates all tables in the database.
     * @throws \yii\db\Exception
     */
    public function actionTruncate()
    {
        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will truncate all tables of current database [' . $dbName . '].')) {
            Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
            $tables = Yii::$app->db->schema->getTableNames();
            foreach ($tables as $table) {
                $this->stdout('Truncating table ' . $table . PHP_EOL, Console::FG_RED);
                Yii::$app->db->createCommand()->truncateTable($table)->execute();
            }
            Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
        }
    }

    /**
     * Drops all tables in the database.
     * @throws \yii\db\Exception
     */
    public function actionDrop()
    {
        $dbName = Yii::$app->db->createCommand('SELECT DATABASE()')->queryScalar();
        if ($this->confirm('This will drop all tables of current database [' . $dbName . '].')) {
            Yii::$app->db->createCommand("SET foreign_key_checks = 0")->execute();
            $tables = Yii::$app->db->schema->getTableNames();
            foreach ($tables as $table) {
                $this->stdout('Dropping table ' . $table . PHP_EOL, Console::FG_RED);
                Yii::$app->db->createCommand()->dropTable($table)->execute();
            }
            Yii::$app->db->createCommand("SET foreign_key_checks = 1")->execute();
        }
    }

    /**
     * @param string $charset
     * @param string $collation
     * @throws \yii\base\ExitException
     * @throws \yii\base\NotSupportedException
     * @throws \yii\db\Exception
     */
    public function actionAlterCharset($charset = 'utf8mb4', $collation = 'utf8mb4_unicode_ci')
    {
        if (Yii::$app->db->getDriverName() !== 'mysql') {
            Console::error('Only mysql is supported');
            Yii::$app->end(1);
        }

        if (!$this->confirm("Convert tables to character set {$charset}?")) {
            Yii::$app->end();
        }

        $tables = Yii::$app->db->getSchema()->getTableNames();
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS = 0')->execute();
        foreach ($tables as $table) {
            $command = Yii::$app->db->createCommand("ALTER TABLE {$table} CONVERT TO CHARACTER SET :charset COLLATE :collation")->bindValues([
                ':charset' => $charset,
                ':collation' => $collation
            ]);
            $command->execute();
        }
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS = 1')->execute();
        Console::output('All ok!');
    }


    /**
     * Adds write permissions
     */
    public function actionSetWritable()
    {
        $this->setWritable($this->writablePaths);
    }

    /**
     * Adds execute permissions
     */
    public function actionSetExecutable()
    {
        $this->setExecutable($this->executablePaths);
    }

    /**
     * Adds random data useful for the frontend application.
     *
     * @param integer $count the amount of random data to be generated
     * @return void
     */
    public function actionDemoData($count = 10)
    {
        // get faker
        if (!class_exists(Factory::class)) {
            Console::output('Faker should be installed. Run `composer install --dev`');
            return ExitCode::CONFIG;
        }

        // add articles and categories
        $factory = Factory::create();
        $this->addArticleCategories($count, $factory);
        $this->addArticles($count, $factory);

        return ExitCode::OK;
    }

    /**
     * Creates random BlogCategory models.
     *
     * @param integer $count The amount of models to be generated
     * @param Faker\Factory $factory The faker factory object
     * @return void
     */
    private function addArticleCategories($count, $factory)
    {
        for ($i=0; $i < $count; $i++) {
            $addParent = rand(0, 2) > 1;
            $parent_id = null;
            if ($addParent) {
                $categories = BlogCategory::find()->all();
                $parent_id = $categories[array_rand($categories)]->id;
            }

            $category = new BlogCategory([
                'title' => $factory->word.' '.$factory->word,
                'status' => array_rand(Status_Article::enums()),
                'parent_id' => $parent_id
            ]);
            $category->slug = Inflector::slug($category->title);
            $category->save(false);
        }
    }

    /**
     * Creates random Article models.
     *
     * @param integer $count The amount of models to be generated
     * @param Faker\Factory $factory The faker factory object
     * @return void
     */
    private function addArticles($count, $factory)
    {
        // get all users and categories
        $users = User::find()->all();
        $categories = BlogCategory::find()->all();

        if (count($users) === 0) {
            Console::output('No users found');
            return ExitCode::CONFIG;
        }

        for ($i=0; $i < $count; $i++) {
            $postUser = $users[array_rand($users)];
            $category = $categories[array_rand($categories)];

            $article = new BlogArticle([
                'category_id' => $category->id,
                'title' => $factory->text(64),
                'body' => $factory->realText(rand(1000, 4000)),
                'created_by' => $postUser->id,
                'updated_by' => $postUser->id,
                'published_at' => rand(time(), strtotime('-2 years')),
                'created_at' => time(),
                'updated_at' => time(),
                'status' => array_rand(Status_Article::enums())
            ]);
            $article->detachBehaviors();
            $article->slug = Inflector::slug($article->title);
            $article->save(false);
        }
    }

    /**
     * @param $paths
     */
    private function setWritable($paths)
    {
        foreach ($paths as $writable) {
            $writable = Yii::getAlias($writable);
            Console::output("Setting writable: {$writable}");
            @chmod($writable, 0777);
        }
    }

    /**
     * @param $paths
     */
    private function setExecutable($paths)
    {
        foreach ($paths as $executable) {
            $executable = Yii::getAlias($executable);
            Console::output("Setting executable: {$executable}");
            @chmod($executable, 0755);
        }
    }

    /**
     * @param $paths
     */
    private function setKeys($paths)
    {
        foreach ($paths as $file) {
            $file = Yii::getAlias($file);
            Console::output("Generating keys in {$file}");
            $content = file_get_contents($file);
            $content = preg_replace_callback('/<generated_key>/', function () {
                $length = 32;
                $bytes = openssl_random_pseudo_bytes(32, $cryptoStrong);
                return strtr(substr(base64_encode($bytes), 0, $length), '+/', '_-');
            }, $content);
            file_put_contents($file, $content);
        }
    }
}
