<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailTemplate;
use app\modules\setup\models\EmailTemplateSearch;

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
