<?php

namespace app\enums;

class Type_View
{
    const Workspace      = 'Workspace';
    const List      = 'List';
    const Form      = 'Form';
    // const Map       = 'Map';
    const Calendar  = 'Calendar';
    const Dashboard = 'Dashboard'; // 'Board' i.e. Composite views (Aggregation, Metrics/Stats)
    const Report    = 'Report';
    const Image     = 'Image'; // 'Grid' i.e. Image thumbs using Cards
    // const Tree      = 'Tree';

    public static function enums()
    {
        return [
            self::Workspace => [
                'icon' => 'table',
                'label' => 'List',
                'color' => '',
                'link' => '#list',
                'action' => ['index'],
            ],
            self::List => [
                'icon' => 'list',
                'label' => 'List',
                'color' => '',
                'link' => '#list',
                'action' => ['index'],
            ],
            // self::Form => [
            //     'icon' => 'columns',
            //     'label' => 'Form',
            //     'color' => '',
            //     'link' => '#form',
            //     'action' => ['create', 'update', 'read'],
            // ],
            // self::Map => [
            //     'icon' => 'map outline',
            //     'label' => 'Map',
            //     'color' => '',
            //     'link' => '#map',
            //     'action' => ['index'],
            // ],
            // self::Calendar => [
            //     'icon' => 'calendar outline',
            //     'label' => 'Calendar',
            //     'color' => '',
            //     'link' => '#calendar',
            //     'action' => ['index'],
            // ],
            self::Dashboard => [
                'icon' => 'pie chart',
                'label' => 'Dashboard',
                'color' => '',
                'link' => '#dashboard',
                'action' => ['index'],
            ],
            // self::Report => [
            //     'icon' => 'line chart',
            //     'label' => 'Report',
            //     'color' => '',
            //     'link' => '#report',
            //     'action' => ['index'],
            // ],
            self::Image => [
                'icon' => 'image',
                'label' => 'Image',
                'color' => '',
                'link' => '#image',
                'action' => ['index'],
            ],
            // self::Tree => [
            //     'icon' => 'sitemap',
            //     'label' => 'Tree',
            //     'color' => '',
            //     'link' => '#tree',
            //     'action' => ['index'],
            // ],
        ];
    }
}