<?php
/**
 * @link https://github.com/logicent/yii2-crudle
 * @copyright Copyright (c) 2022 Appsoft
 * @license http://github.com/logicent/yii2-crudle/LICENSE.md
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
    public $sourcePath = '@app_kit/assets';
    public $css = [
        'main.css',
    ];
    public $js = [
        'kit.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
    ];
}
