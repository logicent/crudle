<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseCrudController;
use Yii;
use yii\helpers\Inflector;

/**
 * Default controller for the `website` module
 */
class DefaultController extends BaseCrudController
{
    public function init()
    {
        parent::init();

        $this->viewPath = Yii::getAlias('@app_website/views') . '/' . Inflector::underscore(
            Inflector::id2camel($this->id)
        );
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
