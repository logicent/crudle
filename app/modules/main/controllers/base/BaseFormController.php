<?php

namespace crudle\main\controllers\base;

use yii\filters\AccessControl;

abstract class BaseFormController extends BaseViewController implements FormInterface
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

    public function actionIndex()
    {}

    // FormInterface
    public function modelClass(): string
    {
        return '';
    }

    public function getModel()
    {
        return $this->model;
    }

    public function detailModelClass(): array
    {
        return [];
    }

    public function detailModels(): array
    {
        return $this->detailModels;
    }

    public function redirectTo(string $action = null)
    {}

    public function validationErrors(): array
    {
        return [];
    }
}
