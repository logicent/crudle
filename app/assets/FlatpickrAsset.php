<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class FlatpickrAsset extends AssetBundle
{
    public $sourcePath = '@bower/flatpickr';
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
