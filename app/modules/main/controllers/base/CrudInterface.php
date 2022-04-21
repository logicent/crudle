<?php

namespace crudle\main\controllers\base;

interface CrudInterface
{
    public function showQuickEntry(): bool;

    public function formViewType();

    // render form view in path
    public function formView(string $action = null, string $path = null);

    public function showLinkedData(): bool;

    public function showComments(): bool;

    // render comment view
    public function commentView(): string;

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

    // crud view search model class
    public function searchModelClass(): string;

    // view search model
    public function searchModel();

    // linked or parent models
    public function linkedModels(): array;

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

    // view is readonly
    public function isReadonly(): bool;
}