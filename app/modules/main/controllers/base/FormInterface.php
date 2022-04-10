<?php

namespace app\modules\main\controllers\base;

interface FormInterface
{
    // form view default action
    public function actionIndex();

    // form view model class
    public function modelClass(): string;

    // form view model
    public function getModel();

    // form view detail model class(es)
    public function detailModelClass(): array;

    // related child or sibling models
    public function detailModels(): array;

    // redirect to (url) after action
    public function redirectTo(string $action);

    // model validation errors
    public function validationErrors(): array;
}