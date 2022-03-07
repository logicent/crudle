<?php

namespace app\modules\website\controllers;

use app\controllers\base\BaseController;

/**
 * Website controller for the `website` module
 */
class WebsiteController extends BaseController
{
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
