<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class TablerIcons extends AssetBundle
{
    public $sourcePath = '@npm/tabler--icons';

    public $css = [
        "iconfont/tabler-icons.min.css",
    ];
}
