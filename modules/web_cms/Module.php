<?php

namespace crudle\ext\web_cms;

use crudle\app\Module as AppModule;
use Yii;

/**
 * cms module definition class
 */
class Module extends AppModule
{
    public $moduleName = 'Web CMS';

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
        Yii::configure($this, require __DIR__ . '/config.php');
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                // cms urls
                ['class' => $this->urlRule, 'pattern' => '/app\/' . $this->id . '/<controller>', 'route' => $this->id . '/cms/<controller>/index'],
                // website urls
                // ['class' => $this->urlRule, 'pattern' => '/' , 'route' => $this->id . '/site/home/index'],
                ['class' => $this->urlRule, 'pattern' => '/home', 'route' => $this->id . '/site/home/index'],
                ['class' => $this->urlRule, 'pattern' => '/about', 'route' => $this->id . '/site/about/index'],
                ['class' => $this->urlRule, 'pattern' => '/contact', 'route' => $this->id . '/site/contact/index'],
                // blog urls
                ['class' => $this->urlRule, 'pattern' => '/blog/category/<id:\w+>', 'route' => $this->id . '/blog/category/read'],
                ['class' => $this->urlRule, 'pattern' => '/blog/category', 'route' => $this->id . '/blog/category/index'],
                ['class' => $this->urlRule, 'pattern' => '/blog/writer/<id:\w+>', 'route' => $this->id . '/blog/writer/read'],
                ['class' => $this->urlRule, 'pattern' => '/blog/writer', 'route' => $this->id . '/blog/writer/index'],
                ['class' => $this->urlRule, 'pattern' => '/blog/<id:\w+>', 'route' => $this->id . '/blog/article/read'],
                ['class' => $this->urlRule, 'pattern' => '/blog', 'route' => $this->id . '/blog/article/index'],
            ], false);
        }
    }
}
