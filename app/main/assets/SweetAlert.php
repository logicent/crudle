<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class SweetAlert extends AssetBundle
{
    public $sourcePath = '@npm/sweetalert2';

    public $js = [
        "dist/sweetalert2.min.js",
    ];

    public $css = [
        "dist/sweetalert2.min.css",
    ];
}
