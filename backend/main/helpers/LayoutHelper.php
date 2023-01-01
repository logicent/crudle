<?php

namespace crudle\app\main\helpers;

/**
 * LayoutHelper helper.
 *
 * @author Appsoft <ken.mwai@appsoft.co.ke>
 * @since 1.0.0
 */
class LayoutHelper
{
    public static function colWidth($controller)
    {
        return
            $controller->id !== 'main' && $controller->showViewSidebar() ?
            $controller->mainColumnWidth() : 
            $controller->fullColumnWidth();
    }

    public static function colPadding($controller)
    {
        if ($controller->showViewSidebar() == false)
            return 'padding-left: 110px; padding-right: 110px;';
    }

    public static function sidebarMargin($controller)
    {
        $style = 'margin-top:';
        if ($controller->id == 'main/dashboard')
            return $style . '103px;';
        return $style . '133px;';
    }
}