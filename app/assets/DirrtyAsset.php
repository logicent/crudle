<?php

namespace app\assets;

use yii\web\AssetBundle;

class DirrtyAsset extends AssetBundle
{
    public $sourcePath = '@bower/dirrty';
    public $js = [
        "dist/jquery.dirrty.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
