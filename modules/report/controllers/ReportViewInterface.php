<?php

namespace crudle\ext\report\controllers;

interface ReportViewInterface
{
    public function showReportMenu(): bool;

    public function reportMenu(): array;
}