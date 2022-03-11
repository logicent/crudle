<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>

<div class="ui icon sidebar vertical menu" id="main_sidebar">
    <div class="item" id="menu_icon">
        <?= Html::a(Elements::icon('window close outline grey', ['style' => 'margin-right: 0em;']), ['#'],
                ['id' => 'hide_sidebar']) ?>
        <?php /*= Html::a(Elements::icon('thumbtack grey'), ['#'],
                ['id' => 'pin_sidebar', 'class' => 'right floated']) */?>
    </div>
    <?= Html::a(Elements::icon('grey globe large') . Yii::t('app', 'Home'),
                ['/'], ['class' => 'item']) ?>
    <?= Html::a(Elements::icon('grey line chart large') . Yii::t('app', 'Report'),
                ['/report'], ['class' => 'item']) ?>
    <?= Html::a(Elements::icon('grey cog large') . Yii::t('app', 'Setup'),
                ['/setup'], ['class' => 'item']) ?>
    <?= Html::a(Elements::icon('grey sitemap large') . Yii::t('app', 'Website'),
                ['/website'], ['class' => 'item']) ?>
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