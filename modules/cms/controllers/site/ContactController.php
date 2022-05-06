<?php

namespace crudle\ext\cms\controllers\site;

use crudle\app\helpers\AppHelper;
use crudle\app\setup\models\Setup;
use crudle\ext\cms\models\ContactPage;

class ContactController extends SiteController
{
    public function actionIndex()
    {
        $this->model = Setup::getSettings( $this->modelClass() );
        // load related settings models
        foreach ($this->model::relations() as $relationAttribute => $relationSettings)
            $this->detailModels[$relationAttribute] = 
            AppHelper::convertArraysToModels($relationSettings['class'], $this->model->$relationAttribute);

        return $this->render('index');
    }

    public function modelClass(): string
    {
        return ContactPage::class;
    }
}
