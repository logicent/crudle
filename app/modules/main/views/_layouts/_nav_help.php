<?php

use yii\helpers\Html;
use yii\helpers\Url;
use Zelenin\yii\SemanticUI\collections\Menu;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">&ensp;
    <?= Yii::t('app', 'Help') ?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu">
    <?php
        foreach ($menuItems as $menuItem) :
            // echo Html::a(Elements::icon($menuItem['icon'] .' '. $menuItem['iconColor']) . Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
            echo Html::a(Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
                        Url::to($menuItem['route'], true),
                        ['class' => 'item']);
        endforeach ?>
    </div>
</div>
