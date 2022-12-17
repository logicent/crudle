<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class Sortablejs extends AssetBundle
{
    public $sourcePath = '@npm/sortablejs';

    public $js = [
        'Sortable.min.js',
    ];

    public $depends = [
        'crudle\app\main\assets\HtmxAsset',
    ];
}
