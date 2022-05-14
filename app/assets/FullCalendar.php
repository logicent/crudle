<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class FullCalendar extends AssetBundle
{
    public $sourcePath = '@bower/fullcalendar';

    public $css = [
        "dist/fullcalendar.min.css",
        // ["dist/fullcalendar.print.min.css", 'media' => 'print'],
    ];
    public $js = [
        "dist/fullcalendar.min.js",
        // "dist/gcal.min.js",
        // "dist/locale-all.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\MomentAsset'
    ];
}
