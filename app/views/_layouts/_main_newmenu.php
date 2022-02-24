<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<!-- <div class="ui menu"> -->
    <div class="ui pointing dropdown">
        <?= Elements::icon('grey unordered list large') ?>
        <span class="text"><?= Yii::t('app', 'Menu') ?></span>&ensp;
        <!-- plus square outline -->
        <?= Elements::icon('down small chevron') ?>

        <div class="menu">
            <?= Html::a(Elements::icon('grey') . Yii::t('app', ''), ['/index'], ['class' => 'item']) ?>
        </div>
    </div>
<!-- </div> -->