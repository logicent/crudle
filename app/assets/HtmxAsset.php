<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class HtmxAsset extends AssetBundle
{
    public $sourcePath = '@npm/htmx.org';

    public $js = [
        "dist/htmx.min.js",
    ];
}
