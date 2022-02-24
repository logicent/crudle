<?php

namespace app\modules\setup\controllers;

use app\modules\setup\controllers\base\BaseSetupCrudController;
use app\modules\setup\models\EmailForm;

class EmailController extends BaseSetupCrudController
{
    public function init()
    {
        $this->modelClass = EmailForm::class;

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
