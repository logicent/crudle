<?php
/**
 * @link https://github.com/logicent/crudle
 * @copyright Copyright (c) 2022 Appsoft
 * @license http://github.com/logicent/crudle/LICENSE.md
 */

namespace crudle\kit;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Gii.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class KitAsset extends AssetBundle
{
    public $sourcePath = '@kitModule/assets';
    public $css = [
        'kit.css',
    ];
    public $js = [
        'kit.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
        // 'yii\gii\TypeAheadAsset',
    ];
}
