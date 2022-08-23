<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class SweetAlert extends AssetBundle
{
    public $sourcePath = '@npm/sweetalert';

    public $js = [
        "src/sweetalert.min.js",
    ];
    public $css = [
        "src/sweetalert.css",
        "src/css/icons.css",
    ];
    // public $depends = [
    //     'yii\web\JqueryAsset'
    // ];
}
