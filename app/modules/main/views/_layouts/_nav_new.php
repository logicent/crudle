<?php

use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">
    <span class="text" style="font-size: 140%">+</span>&nbsp;
    <span class="text"><?= Yii::t('app', 'Create') ?></span>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu" style="margin-top: 1em !important;">
    <?php
        foreach ($menuItems as $menuItem) :
            // echo Html::a(Elements::icon($menuItem['icon'] .' '. $menuItem['iconColor']) . Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
            echo Html::a(Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
                        Url::to([$menuItem['route']. '/create']),
                        ['class' => 'item']);
        endforeach ?>
    </div>
</div>&ensp;
