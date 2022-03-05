<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\collections\Menu;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui dropdown item">&ensp;
    <?= Yii::t('app', 'Help') ?>
    <?= Elements::icon('down small chevron') ?>
    <div class="menu">
        <?= Html::a(Yii::t('app', 'User manual'), ['main/user-manual'], ['class' => 'item']) ?>
        <div class="divider" style="margin: 0"></div>
        <?= Html::a(Yii::t('app', 'About'), ['main/about'], ['class' => 'item']) ?>
    </div>
</div>

<div class="ui dropdown item right">
    <!-- <img class="ui mini image" src="<?= Yii::$app->urlManager->baseUrl ?>/img/photo-ph.jpg"> &ensp;-->
    <?= is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->identity->username ?>&ensp;
    <?= Elements::icon('down small chevron') ?>
    <div class="menu">
        <?= Html::a(Yii::t('app', 'My preferences'), ['people/edit-preferences', 'id' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->id], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'My account'), ['people/update', 'id' => is_null( Yii::$app->user->identity ) ? '' : Yii::$app->user->id], ['class' => 'item']) ?>
        <div class="divider" style="margin: 0"></div>
        <?= Html::a(Yii::t('app', 'Visit website'), ['site/index'], ['class' => 'item']) ?>
        <?= Html::a(Yii::t('app', 'Log out'), ['/logout'], [
            'class' => 'item',
            'data' => ['method' => 'post']
        ]) ?>
    </div><!-- ./menu -->
</div><!-- ./dropdown item -->

<div class="ui dropdown item" id="open_issues">
    <?= Html::a(Elements::icon('bell outline orange large'), ['#'],
            [
                'class' => 'compact ui icon button',
                'style' => 'background: #fafbfc'
            ]) ?>
    <div class="ui vertical menu">
        <?= $this->render('_main_navalert') ?>
    </div><!-- ./vertical menu -->
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
