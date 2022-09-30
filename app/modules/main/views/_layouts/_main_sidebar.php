<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use yii\helpers\Url;

$currentUrl = explode('/', Url::current());
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
            Elements::icon('grey dashboard large')
            . Yii::t('app', 'Dashboards'),
            ['/app/dashboards'],
            ['class' => $currentUrl[2] == 'dashboards' ? 'item active' : 'item']) ?>
    <?= Html::a(
            Elements::icon('grey line chart large')
            . Yii::t('app', 'Reports'),
            ['/app/reports'],
            ['class' => $currentUrl[2] == 'reports' ? 'item active' : 'item']) ?>
    <?= Html::a(
            Elements::icon('grey windows large')
            . Yii::t('app', 'Main'),
            ['/main'],
            ['class' => $currentUrl[1] == 'main' ? 'item active' : 'item']) ?>
    <?= Html::a(
            Elements::icon('grey toggle on large')
            . Yii::t('app', 'Setup'),
            ['/setup'],
            ['class' => $currentUrl[1] == 'setup' ? 'item active' : 'item']) ?>
    <?= Html::a(
            Elements::icon('grey sitemap large')
            . Yii::t('app', 'Web CMS'),
            ['/web-cms'],
            ['class' => $currentUrl[1] == 'web-cms' ? 'item active' : 'item']) ?>
    <?= Html::a(
            Elements::icon('grey code large')
            . Yii::t('app', 'Kit'),
            '/kit',
            ['class' => $currentUrl[1] == 'kit' ? 'item active' : 'item']) ?>
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
