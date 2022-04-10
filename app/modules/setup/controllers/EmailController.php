<?php

namespace app\modules\setup\controllers;

use app\modules\main\controllers\base\BaseFormController;
use app\modules\setup\models\EmailForm;

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
