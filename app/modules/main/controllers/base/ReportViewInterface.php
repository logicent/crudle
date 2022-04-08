<?php

namespace app\modules\main\controllers\base;

interface ReportViewInterface
{
    public function actionMyReportSettings(): array;

    public function showReportMenu(): bool;

    public function reportMenu(): array;
}