<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">
    <?= Elements::icon('grey plus square outline large') ?>
    <span class="text"><?= Yii::t('app', 'Create') ?></span>&ensp;
    <?= Elements::icon('down small chevron') ?>

    <div class="menu">
        <?= Html::a(Elements::icon('grey shopping basket') . Yii::t('app', 'Doc Type'),
                    ['/customize/doc-type/create'], ['class' => 'item']) ?>
    </div>
</div>&ensp;
