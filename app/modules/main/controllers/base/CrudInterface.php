<?php

namespace crudle\main\controllers\base;

interface CrudInterface
{
    // view default action
    public function actionIndex();

    // form view create action
    public function actionCreate($id = null);

    // form view update action
    public function actionUpdate($id);

    // form view update status action
    public function actionUpdateStatus($id);

    // form view submit action
    public function actionSubmit($id);

    // form view cancel action
    public function actionCancel($id);

    // form view amend action
    public function actionAmend($id);

    // form view delete action
    public function actionDelete($id);

    // form view add row action
    public function actionAddRow();

    // form view edit row action
    public function actionEditRow($id);

    // form view get item action
    public function actionGetItem($id);

    // form view delete row action
    public function actionDeleteRow($id);

    // list view batch action via ajax
    public function actionBatch();

    // crud view model class
    public function modelClass(): string;

    // crud view search model class
    public function searchModelClass(): string;

    // crud view detail model class(es)
    public function detailModelClass(): array;

    // crud view model
    public function getModel();

    // view search model
    public function searchModel();

    // linked or parent models
    public function linkedModels(): array;

    // related child or sibling models
    public function detailModels(): array;

    // redirect to (url) after action
    public function redirectTo(string $action);

    // redirect to (url) after create
    public function redirectOnCreate();

    // refresh/reload model after create
    public function viewCreated(): bool;

    // redirect to (url) after update
    public function redirectOnUpdate();

    // refresh/reload model after update
    public function viewUpdated(): bool;

    // redirect to (url) after delete
    public function redirectOnDelete();

    // detail model validation errors
    public function validationErrors(): array;

    // view is readonly
    public function isReadonly(): bool;
}