<?php


namespace crudle\app\dashboard\assets;

use yii\web\AssetBundle;

/**
 *
 * ChartPluginAsset
 */
class ChartJsAsset extends AssetBundle
{
    public $sourcePath = null;

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}