<?php

namespace app\modules\main\controllers\base;

interface ViewInterface
{
    public function viewName(): string;

    // tabs support - multiple views of type
    public function showTabbedViews(): bool;

    public function actionSwitchViewType(string $name);
    public function currentViewType(); // enum

    public function showViewTypeSwitcher(): bool;
    public function showViewFilterButton(): bool;
    public function getViewFilterButtonState();
    public function setViewFilterButtonState();

    public function showViewHeader(): bool;
    public function showViewSidebar(): bool;

    public function showQuickReportMenu(): bool;
    public function quickReportMenu(): array;
}