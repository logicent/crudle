<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\collections\Menu;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">&ensp;
    <?= Yii::t('app', 'Help') ?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu">
        <?= Html::a(Yii::t('app', 'User manual'), ['main/user-manual'], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'User forum'), ['main/user-forum'], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'Report an issue'), ['main/report-an-issue'], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'About'), ['main/about'], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'Keyboard shortcuts'), ['main/keyboard-shortcuts'], ['class' => 'item']) ?>
    </div>
</div>
