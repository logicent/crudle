<?php

namespace app\modules\main\controllers\base;

interface LayoutInterface
{
    // multi(ple) tab support i.e. open several documents at the same time
    public function showMultipleTabs();
    public function allowThemeChange();
    public function currentTheme();
    public function supportedThemes();
    public function allowThemeCustomization();
    public function currentUserPreferences();
}