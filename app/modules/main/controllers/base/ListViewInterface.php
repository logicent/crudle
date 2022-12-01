<?php

namespace crudle\app\main\controllers\base;

interface ListViewInterface
{
    public function listRouteId(): string;

    // public function listRouteParams(): array;

    public function showBatchActions(): bool;

    public function batchActionsMenu(): array;
}
