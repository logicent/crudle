<?php

namespace crudle\app\listing\controllers\base;

interface ListInterface
{
    public function listRouteId(): string;

    // public function listRouteParams(): array;

    public function showBatchActions(): bool;

    public function batchActionsMenu(): array;
}
