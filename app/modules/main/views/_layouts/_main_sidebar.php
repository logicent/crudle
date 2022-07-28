<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui visible icon sidebar vertical menu" id="main_sidebar">
    <!-- <div class="item" id="menu_icon"> -->
        <?php /*= Html::a(Elements::icon('window close outline grey', ['style' => 'margin-right: 0em;']),
                    false,
                    ['id' => 'hide_sidebar']) */?>
        <?php /*= Html::a(Elements::icon('thumbtack grey'), ['#'],
                ['id' => 'pin_sidebar', 'class' => 'right floated']) */?>
    <!-- </div> -->
    <?php /*= Html::a(
            Elements::icon('brown globe large') .
            Yii::t('app', 'Home'), ['/app/home'], ['class' => 'item']) */?>
    <?= Html::a(
            Elements::icon('blue dashboard large')
            . Yii::t('app', 'Dashboards'),
            ['/app/dashboards'],
            ['class' => 'item']) ?>
    <?= Html::a(
            Elements::icon('teal line chart large')
            . Yii::t('app', 'Reports'),
            ['/app/reports'],
            ['class' => 'item']) ?>
    <?= Html::a(
            Elements::icon('green windows large')
            . Yii::t('app', 'Main'),
            ['/main'],
            ['class' => 'item']) ?>
    <?= Html::a(
            Elements::icon('olive cog large')
            . Yii::t('app', 'Setup'),
            ['/setup'],
            ['class' => 'item']) ?>
    <?= Html::a(
            Elements::icon('yellow sitemap large')
            . Yii::t('app', 'Web CMS'),
            ['/web-cms'],
            ['class' => 'item']) ?>
    <?= Html::a(
            Elements::icon('brown code large')
            . Yii::t('app', 'Kit'),
            '/kit',
            ['class' => 'item']) ?>
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
JS) ?>
