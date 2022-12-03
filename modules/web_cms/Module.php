<?php

namespace crudle\ext\web_cms;

use Yii;
use yii\base\BootstrapInterface;

/**
 * cms module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public $moduleName = 'Web CMS';
    // public $isInstalled = true; // if db migrations have run
    public $isActivated = true; // will be loaded in app run
    // public $activationRule = [];
    // public $isTranslatable = true; // if translation resource exists

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'crudle\ext\web_cms\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        Yii::configure($this, require __DIR__ . '/config.php');
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                // ['class' => 'yii\web\UrlRule', 'pattern' => '/' , 'route' => $this->id . '/site/home/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/home', 'route' => $this->id . '/site/home/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/about', 'route' => $this->id . '/site/about/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/contact', 'route' => $this->id . '/site/contact/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/blog/category/<id:\w+>', 'route' => $this->id . '/site/blog-category/read'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/blog/category', 'route' => $this->id . '/site/blog-category/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/blog/writer/<id:\w+>', 'route' => $this->id . '/site/blog-writer/read'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/blog/writer', 'route' => $this->id . '/site/blog-writer/index'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/blog/<id:\w+>', 'route' => $this->id . '/site/blog-article/read'],
                ['class' => 'yii\web\UrlRule', 'pattern' => '/blog', 'route' => $this->id . '/site/blog-article/index'],
            ], false);
        }
        // elseif ($app instanceof \yii\console\Application) {
        //     $app->controllerMap[$this->id] = [
        //         'class' => "crudle\{$this->id}\console\SiteController",
        //         'module' => $this,
        //     ];
        // }
    }
}
