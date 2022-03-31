<?php

namespace app\modules\website\controllers\site;

use app\modules\website\models\AboutPage;


class AboutController extends SiteController
{
    public function init()
    {
        $this->modelClass = AboutPage::class;

        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
