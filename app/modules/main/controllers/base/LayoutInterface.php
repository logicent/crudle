<?php

namespace crudle\main\controllers\base;

interface LayoutInterface
{
    public function allowThemeChange(): bool;
    public function currentTheme(): string; // enum
    public function supportedThemes(): array; // enum
    public function allowThemeCustomization(): bool;

    public function actionMyLayoutSettings();

    public function pageNavbar(): string;
    public function showMainSidebar(): bool;
    public function sidebarColWidth(): string;
    public function mainColumnWidth(): string;
    public function fullColumnWidth(): string;

    public function showActiveUsers(): bool;
}