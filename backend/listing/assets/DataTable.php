<?php

namespace crudle\app\listing\assets;

use yii\web\AssetBundle;

class DataTable extends AssetBundle
{
    public $sourcePath = '@npm';

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
