<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\collections\Menu;
use Zelenin\yii\SemanticUI\Elements;

?>
<div class="ui dropdown item right">
    <!-- To-Do: find a better (smaller) placeholder image or use current user initials -->
    <!-- <img class="ui mini image" src="<?= Yii::getAlias('@web') ?>/img/photo-ph.jpg"> &ensp;-->
    <?= !is_null(Yii::$app->user->identity) ? Yii::$app->user->identity->username : '' ?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu">
    <?php
        if ((bool) $layoutSettings->allowUserPreference) :
            echo Html::a(Yii::t('app', 'My preferences'),
                        ['/setup/user/edit-preferences', 'id' => Yii::$app->user->id],
                        ['class' => 'item']);
        endif ?>
        <?= Html::a(Yii::t('app', 'My account'),
                    ['/setup/user/update', 'id' => Yii::$app->user->id],
                    ['class' => 'item']) ?>
        <?php
            if ((bool) $layoutSettings->hideWebsiteLink === false) :
                echo Html::a(Yii::t('app', 'Visit website'), ['/'], ['class' => 'item']);
            endif ?>
        <?= Html::tag('div', null, ['class' => 'divider', 'style' => 'margin: 0']) ?>
        <?= Html::a(Yii::t('app', 'Log out'), ['/app/logout'], [
                'class' => 'item',
                'data' => ['method' => 'post']
            ]) ?>
    </div><!-- ./menu -->
</div><!-- ./dropdown item -->

<?php
// To-Do: investigate how to make it work like plain html text above
// echo
Menu::widget([
    'text' => true,
    'rightMenuItems' => [
        [
            'label' => !is_null(Yii::$app->user->identity) ? Yii::$app->user->identity->username : '', //  . Elements::icon('down small chevron')
            'items' => [
                [
                    'label' => Yii::t('app', 'Visit website'),
                    'url' => ['/'],
                    'options' => ['class' => 'item']
                ],
                [
                    'label' => Yii::t('app', 'My account'),
                    'url' => ['/setup/user/update', 'id' => Yii::$app->user->id],
                    'options' => ['class' => 'item']
                ],
                [
                    'label' => false,
                    'url' => false,
                    'options' => [
                        'class' => 'ui divider',
                        'style' => 'margin: 0'
                    ]
                ],
                [
                    'label' => Yii::t('app', 'Log out'),
                    'url' => ['/app/logout'],
                    'options' => [
                        'class' => 'item',
                        'data' => ['method' => 'post']
                    ]
                ],
            ]
        ],
    ]
]) ?>