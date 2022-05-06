<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class DataTableAsset extends AssetBundle
{
    public $sourcePath = '@bower';

    public $css = [
        "datatables.net-se/css/dataTables.semanticui.min.css",
    ];

    public $js = [
        "datatables.net/js/jquery.dataTables.min.js",
        "datatables.net-se/js/dataTables.semanticui.min.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];    
}
