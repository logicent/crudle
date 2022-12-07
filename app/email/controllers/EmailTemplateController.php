<?php

namespace crudle\app\email\controllers;

use crudle\app\crud\controllers\CrudController;
use crudle\app\email\models\EmailTemplate;
use crudle\app\email\models\search\EmailTemplateSearch;

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
