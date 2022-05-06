<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseCrudController;
use crudle\app\setup\models\EmailTemplate;
use crudle\app\setup\models\search\EmailTemplateSearch;

class EmailTemplateController extends BaseCrudController
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
