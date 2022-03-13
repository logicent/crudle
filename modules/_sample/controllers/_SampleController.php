<?php

namespace app\modules\_sample\controllers;

use app\controllers\base\BaseController;

/**
 * _SampleController for the `_sample` module
 */
class _SampleController extends BaseController
{
    /**
     * Renders the default index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->sidebar = false;

        return $this->render('index');
    }
}
