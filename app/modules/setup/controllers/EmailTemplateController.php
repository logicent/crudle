<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseCrudController;
use crudle\setup\models\EmailTemplate;
use crudle\setup\models\EmailTemplateSearch;

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
