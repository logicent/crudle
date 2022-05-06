<?php

namespace crudle\app\main\controllers\base;

use yii\filters\AccessControl;

abstract class BaseFormController extends BaseViewController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        // 'roles' => [ Type_Permission::SubmitForm .' '. $this->viewName() ],
                    ],
                ],
            ],
        ];
    }
}
