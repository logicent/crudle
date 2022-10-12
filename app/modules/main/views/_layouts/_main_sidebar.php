<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use yii\helpers\Url;

$currentUrl = explode('/', Url::current());
?>

<div class="ui visible icon sidebar vertical menu" id="main_sidebar">
        <div class="item" id="menu_icon">
        <?= Html::a(Elements::icon('grey close outline grey', ['style' => 'margin-right: 0em;']),
                    false,
                    ['id' => 'hide_sidebar']) ?>
        <?= Html::a(Elements::icon('grey menu'), ['#'],
                ['id' => 'pin_sidebar', 'class' => 'right floated']) ?>
        </div>
        <?= Html::a(
            Elements::icon('grey globe large') .
            Yii::t('app', 'Home'), ['/app/home'], ['class' => 'item']) ?>
        <?= Html::a(
                        Elements::icon('grey dashboard large')
                                . Yii::t('app', 'Dashboards'),
                        ['/app/dashboards'],
                        ['class' => 'item']
                ) ?>

        <?= Html::a(
                Elements::icon('grey bar chart large')
                        . Yii::t('app', 'Reports'),
                ['/reports'],
                ['class' => 'item']
        ) ?>
        <?= Html::a(
                        Elements::icon('grey windows large')
                                . Yii::t('app', 'Main'),
                        ['/main'],
                        ['class' => 'item']
                ) ?>
        <?= Html::a(
                Elements::icon('grey toggle on large')
                        . Yii::t('app', 'Setup'),
                ['/setup/user'],
                ['class' => 'item']
        ) ?>
        <?= Html::a(
                Elements::icon('grey sitemap large')
                        . Yii::t('app', 'Web CMS'),
                ['/web-cms'],
                ['class' => 'item']
        ) ?>
        <?= Html::a(
                Elements::icon('grey code large')
                        . Yii::t('app', 'Kit'),
                ['/kit'],
                ['class' => 'item']
        ) ?>
</div>

<?php
$this->registerJs(<<<JS
    $('#main_menu').on('click', function(e){
        // $('.ui.labeled.icon.sidebar')
        $('.ui.sidebar')
            .sidebar('setting', 'dimPage', false)
            .sidebar('setting', 'transition', 'overlay')
            .sidebar('setting', 'onChange', $('body').removeClass('dimmable pushable'))
            .sidebar('toggle');
    });
JS);