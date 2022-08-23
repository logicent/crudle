<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\collections\Menu;
use icms\FomanticUI\Elements;

?>

<div class="ui dropdown item">&ensp;
    <?= Yii::t('app', 'Help') ?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu">
    <?php
        foreach ($menuItems as $menuItem) :
            if ((bool) $menuItem['inactive']) :
                continue;
            endif;
            // echo Html::a(Elements::icon($menuItem['icon'] .' '. $menuItem['iconColor']) . Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
            echo Html::a(Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
                        Url::to($menuItem['route'], true), [
                            'class' => 'item',
                            'target' => (bool) $menuItem['openInNewTab'] ? '_blank' : false
                        ]);
        endforeach ?>
    </div>
</div>
