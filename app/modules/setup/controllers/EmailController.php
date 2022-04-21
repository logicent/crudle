<?php

namespace crudle\setup\controllers;

use crudle\main\controllers\base\BaseFormController;
use crudle\setup\models\EmailForm;

class EmailController extends BaseFormController
{
    public function modelClass(): string
    {
        return EmailForm::class;
    }

    public function actionIndex()
    {
        $model = new EmailForm();

        return $this->renderAjax('/email', [
                    'model' => $model
                ]);
    }
}
