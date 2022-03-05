<?php

namespace app\modules\setup\controllers;

use app\controllers\base\BaseCrudController;
use app\modules\setup\models\EmailForm;

class EmailController extends BaseCrudController
{
    public function init()
    {
        $this->modelClass = EmailForm::class;
        $this->modelSearchClass = EmailSearch::class;

        return parent::init();
    }

    public function actionIndex()
    {
        $model = new EmailForm();

        return $this->renderAjax('/email', [
                    'model' => $model
                ]);
    }
}
