<?php

namespace crudle\app\calendar\assets;

use yii\web\AssetBundle;

class FullCalendar extends AssetBundle
{
    public $sourcePath = '@bower/fullcalendar';

    // public $css = [
    //     "main.min.css",
    // ];

    public $js = [
        'main.min.js',
        // "dist/gcal.min.js",
        // "dist/locale-all.js",
    ];

    // public $depends = [
    //     'yii\web\JqueryAsset',
    // ];
}
