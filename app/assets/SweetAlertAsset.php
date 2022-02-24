<?php

namespace app\assets;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    public $sourcePath = '@bower/sweetalert';

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
