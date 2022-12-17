<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class Flatpickr extends AssetBundle
{
    public $sourcePath = '@npm/flatpickr';

    public $css = [
        "dist/flatpickr.min.css",
    ];

    public $js = [
        "dist/flatpickr.min.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
