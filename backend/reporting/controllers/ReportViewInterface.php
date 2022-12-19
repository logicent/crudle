<?php

namespace crudle\app\reporting\controllers;

interface ReportViewInterface
{
    public function showReportMenu(): bool;

    public function reportMenu(): array;
}