<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">
    <span class="text" style="font-size: 140%">+</span>&nbsp;
    <span class="text"><?= Yii::t('app', 'Create') ?></span>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu" style="margin-top: 1em !important;">
        <?= Html::a(Elements::icon('grey file alternate outline') . Yii::t('app', 'Doc Type'),
                    ['/customize/doc-type/create'], ['class' => 'item']) ?>
    </div>
</div>&ensp;
