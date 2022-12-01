<?php

use yii\helpers\Html;
use yii\helpers\Url;
use icms\FomanticUI\Elements;

?>

<div class="ui dropdown item" id="open_issues">
    <?= Html::a(Elements::icon('bell outline orange large'), ['#'],
            [
                'class' => 'compact ui icon button',
                'style' => 'background: #fafbfc'
            ]) ?>
    <div class="ui vertical menu nav-menu" style="margin-top: 0.8em !important;">
    <?php
        foreach ($menuItems as $menuItem) :
            if ((bool) $menuItem['inactive']) :
                continue;
            endif;
            // echo Html::a(Elements::icon($menuItem['icon'] .' '. $menuItem['iconColor']) . Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]),
            echo Html::a(Yii::t('app', '{menuItem}', ['menuItem' => $menuItem['label']]) . 
                        Html::tag('div', '0', ['class' => 'ui circular label']),
                        Url::to([$menuItem['route']]),
                        ['class' => 'item']);
        endforeach ?>
    </div><!-- ./vertical menu -->
</div><!-- ./dropdown item -->