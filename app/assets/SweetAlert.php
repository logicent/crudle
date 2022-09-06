<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class SweetAlert extends AssetBundle
{
    public $sourcePath = '@npm/sweetalert2';

    public $js = [
        "dist/sweetalert2.min.js",
    ];
    public $css = [
        "dist/sweetalert2.min.css",
        // "css/icons.css",
    ];
    // public $depends = [
    //     'yii\web\JqueryAsset'
    // ];
}
