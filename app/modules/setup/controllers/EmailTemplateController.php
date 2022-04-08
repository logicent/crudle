<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailTemplate;
use app\modules\setup\models\EmailTemplateSearch;

class EmailTemplateController extends BaseCrudController
{
    public function modelClass()
    {
        return EmailTemplate::class;
    }

    public function searchModelClass()
    {
        return EmailTemplateSearch::class;
    }
}
