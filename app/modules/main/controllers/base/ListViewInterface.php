<?php

namespace app\modules\main\controllers\base;

interface ListViewInterface
{
    public function actionMyListviewSettings();

    public function listviewType(); // enum

    public function showBatchActions(): bool;

    public function batchActionsMenu(): bool;

    public function showListMenu(): bool;

    public function listMenu(): array;
}