<?php

namespace logicent\cms\controllers\site;

use app\helpers\App;
use crudle\setup\models\Setup;
use logicent\cms\models\ContactPage;

class ContactController extends SiteController
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
        return ContactPage::class;
    }
}
