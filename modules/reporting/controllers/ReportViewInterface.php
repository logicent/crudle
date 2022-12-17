<?php

namespace crudle\ext\reporting\controllers;

interface ReportViewInterface
{
    public function showReportMenu(): bool;

    public function reportMenu(): array;
}