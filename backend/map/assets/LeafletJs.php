<?php

namespace crudle\app\map\assets;

use yii\web\AssetBundle;

class LeafletJs extends AssetBundle
{
    public $sourcePath = '@npm/leaflet';

    public $css = [
        "dist/leaflet.css",
    ];

    public $js = [
        "dist/leaflet.js",
    ];

    // public $depends = [
    //     'yii\web\JqueryAsset',
    // ];
}
