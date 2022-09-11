<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class Sortablejs extends AssetBundle
{
    public $sourcePath = '@npm/sortablejs';

    public $js = [
        'Sortable.min.js',
    ];
}
