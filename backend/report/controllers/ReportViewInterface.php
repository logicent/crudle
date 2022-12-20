<?php

namespace crudle\app\report\controllers;

interface ReportViewInterface
{
    public function showReportMenu(): bool;

    public function reportMenu(): array;
}