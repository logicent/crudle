<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\CrudController;
use crudle\app\setup\models\EmailTemplate;
use crudle\app\setup\models\search\EmailTemplateSearch;

class EmailTemplateController extends CrudController
{
    public function modelClass(): string
    {
        return EmailTemplate::class;
    }

    public function searchModelClass(): string
    {
        return EmailTemplateSearch::class;
    }
}
