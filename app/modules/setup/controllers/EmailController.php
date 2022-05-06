<?php

namespace crudle\app\setup\controllers;

use crudle\app\main\controllers\base\BaseFormController;
use crudle\app\setup\models\EmailForm;

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
