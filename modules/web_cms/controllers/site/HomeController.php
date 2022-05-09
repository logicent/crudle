<?php

namespace crudle\ext\web_cms\controllers\site;

use crudle\app\helpers\AppHelper;
use crudle\app\setup\models\Setup;
use crudle\ext\web_cms\models\WebsiteSettingsForm;

class HomeController extends SiteController
{
    public function actionIndex()
    {
        $this->model = Setup::getSettings( $this->modelClass() );
        // load related settings models
        foreach ($this->model::relations() as $relationAttribute => $relationSettings)
            $this->detailModels[$relationAttribute] = 
            AppHelper::convertArraysToModels($relationSettings['class'], $this->model->$relationAttribute);

        // slideshow
        return $this->render('index');
    }

    public function modelClass(): string
    {
        return WebsiteSettingsForm::class;
    }
}
