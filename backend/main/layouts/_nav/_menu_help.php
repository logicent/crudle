<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;


$menuItems = [
    [
        // 'icon' => 'grey download large',
        'route' => 'https://mysqltutorial.org',
        'label' => 'MySQL Tutorial',
        'openInNewTab' => true,
        'inactive' => false,
    ],
    // [
    //     // 'icon' => 'grey download large',
    //     'route' => 'https://www.sqltutorial.org',
    //     'label' => 'SQL Tutorial',
    //     'openInNewTab' => true,
    //     'inactive' => false,
    // ],
    [
        // 'icon' => 'grey download large',
        'route' => 'https://sqlfordevs.com/tips',
        'label' => 'SQL Tips for Devs',
        'openInNewTab' => true,
        'inactive' => false,
    ],
    [
        // 'icon' => 'grey download large',
        'route' => 'https://mode.com/sql-tutorial',
        'label' => 'Mode SQL Tutorial',
        'openInNewTab' => true,
        'inactive' => false,
    ],
];
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