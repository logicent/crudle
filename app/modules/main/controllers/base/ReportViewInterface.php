<?php

namespace crudle\app\main\controllers\base;

interface ReportViewInterface
{
    public function showReportMenu(): bool;

    public function reportMenu(): array;
}