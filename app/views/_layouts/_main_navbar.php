<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\collections\Breadcrumb;
use Zelenin\yii\SemanticUI\Elements;

?>

<div id="main_nav" class="ui attached menu text">
    <div class="ui grid container">
        <div class="item" id="home_icon">
            <?= Html::a(Elements::icon('globe brown large'), ['/'], ['class' => "compact ui icon button"]) ?>
        </div>

        <div class="computer only large screen only four wide column item">
            <?php
            if ($this->context->id !== 'main') :
                echo Breadcrumb::widget([
                        'divider' => Breadcrumb::DIVIDER_CHEVRON,
                        'homeLink' => [
                            'label' => '', // sets divider only to point back to home icon button
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
            endif ?>
        </div>

        <div class="computer only large screen only eleven wide column item right">
            <?= $this->render('_main_newmenu') ?>
            <?= $this->render('_global_search') ?>
            <?= $this->render('_main_navmenu') ?>
        </div>
    </div><!-- ./grid container -->
</div><!-- ./attached menu text -->
<?php 
$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown();
JS) ?>