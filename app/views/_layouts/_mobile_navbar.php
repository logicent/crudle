<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

?>
<!-- top fixed -->
<div id="main_nav" class="ui attached menu text">
    <div class="ui grid container">
        <div class="mobile only two wide column item">
            <?php
            if ($this->context->id !== 'main') : // && $this->context->id !== 'report-builder'
                echo Elements::button(Elements::icon('sidebar'), ['class' => 'compact basic icon']) ?>
                <div class="ui bottom attached segment pushable">
                    <div class="ui inverted labeled icon left inline vertical sidebar menu" style="">
                       Context menu here
                    </div>
                </div>
            <?php 
            endif ?>
        </div>

        <div class="column header item" id="me_icon">
            <div class="compact ui icon buttons">
              <?= Html::a(Elements::icon('globe black large'), ['/'], ['class' => "ui button"]) ?>
            </div>
        </div>

        <div class="mobile only six wide column right menu">
            <?= $this->render('_main_navmenu') ?>
        </div>
    </div><!-- ./grid container -->
</div><!-- ./attached menu text -->

<?php
$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown();
JS) ?>
