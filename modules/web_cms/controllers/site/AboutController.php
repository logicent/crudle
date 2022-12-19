<?php

namespace crudle\ext\web_cms\controllers\site;

use crudle\app\main\helpers\App;
use crudle\app\setting\models\Setup;
use crudle\ext\web_cms\models\AboutPage;

class AboutController extends SiteController
{
    public function actionIndex()
    {
        $this->model = Setup::getSettings( $this->modelClass() );
        // load related settings models
        foreach ($this->model::relations() as $relationAttribute => $relationSettings)
            $this->detailModels[$relationAttribute] = 
            App::convertArraysToModels($relationSettings['class'], $this->model->$relationAttribute);

        return $this->render('index');
    }

    public function modelClass(): string
    {
        return AboutPage::class;
    }
}
