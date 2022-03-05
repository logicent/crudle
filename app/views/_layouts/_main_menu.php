<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<?= Html::a(Elements::icon('grey options large') . Yii::t('app', 'Customize'),
            ['/customize'], ['class' => 'item']) ?>
<?= Html::a(Elements::icon('grey sitemap large') . Yii::t('app', 'Website'),
            ['/website'], ['class' => 'item']) ?>