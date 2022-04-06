<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\collections\Menu;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item right">
    <!-- <img class="ui mini image" src="<?= Yii::$app->urlManager->baseUrl ?>/img/photo-ph.jpg"> &ensp;-->
    <?= is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->identity->username ?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu nav-menu">
        <?= Html::a(Yii::t('app', 'My preferences'), ['/setup/user/edit-preferences', 'id' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->id], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'My account'), ['/setup/user/update', 'id' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->id], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'Visit website'), ['/'], ['class' => 'item']) ?>
        <?= Html::tag('div', null, ['class' => 'divider', 'style' => 'margin: 0']) ?>
        <?= Html::a(Yii::t('app', 'Log out'), ['/app/logout'], [
                'class' => 'item',
                'data' => ['method' => 'post']
            ]) ?>
    </div><!-- ./menu -->
</div><!-- ./dropdown item -->

<?php
Menu::widget([
    'text' => true,
    'rightMenuItems' => [
        [
            'label' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->identity->username . '<i class="dropdown icon"></i>',
            'items' => [
                [
                    'label' => Yii::t('app', 'Visit Website'),
                    'url' => ['site/index'],
                    'options' => [
                        'class' => 'item',
                    ]
                ],
                [
                    'label' => Yii::t('app', 'My Account'),
                    'url' => ['people/update', 'id' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->id],
                    'options' => [
                        'class' => 'item',
                    ]
                ],
                [
                    'label' => Yii::t('app', 'Log out'),
                    'url' => ['/logout'],
                    'options' => [
                        'class' => 'item',
                        'data' => ['method' => 'post']
                    ]
                ],
            ]
        ],
    ]
]); ?>
