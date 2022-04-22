<?php

namespace crudle\main\controllers\base;

interface ViewInterface
{
    public function viewName(): string;

    // tabs support - multiple views of type
    public function showTabbedViews(): bool;

    public function actionSwitchViewType(string $name);
    public function defaultViewType(); // : use enum class in v8.1

    public function showViewTypeSwitcher(): bool;
    public function showViewFilterButton(): bool;
    public function getViewFilterButtonState();
    public function setViewFilterButtonState();

    public function showViewHeader(): bool;
    public function showViewSidebar(): bool;

    public function showQuickReportMenu(): bool;
    public function quickReportMenu(): array;

    // default view action
    public function actionIndex();

    // primary view model class
    public function modelClass(): string;

    // primary view model
    public function getModel();

    // related view model class(es)
    public function detailModelClass(): array;

    // related child or sibling models
    public function getDetailModels(): array;

    // redirect to (url) after action
    public function redirectTo(string $action = null);

    // model(s) validation errors
    public function validationErrors(): array;
}