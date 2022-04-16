<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\collections\Breadcrumb;
use Zelenin\yii\SemanticUI\Elements;

?>

<?php $this->beginBlock('_main_navbar') ?>

<div id="main_nav" class="ui attached menu text">
    <div class="item" id="menu_icon">
        <?= Html::a(Elements::icon('sidebar large'), ['#'],
                [
                    'id' => 'main_menu',
                    'style' => 'position: fixed; padding-left: 0.65em; color: grey; background: none;'
                ]) ?>
    </div>
    <div class="ui grid container">
        <div class="item" id="home_icon">
            <?= Html::a(Elements::icon($layoutSettings->homeButtonIcon), ['/app/home'], ['class' => "compact ui icon button"]) ?>
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

        <div class="computer only large screen only ten wide column item right">
        <?php
            if ((bool) $layoutSettings->hideCreateMenu == false) :
                echo $this->render('_nav_new', ['menuItems' => $layoutSettings->createMenu]);
            endif;

            if ((bool) $layoutSettings->hideSearchbar == false) :
                echo $this->render('_global_search');
            endif;

            if ((bool) $layoutSettings->hideHelpMenu == false) :
                echo $this->render('_nav_help', ['menuItems' => $layoutSettings->helpMenu]);
            endif;

            echo $this->render('_nav_user', ['layoutSettings' => $layoutSettings]);

            if ((bool) $layoutSettings->hideAlertMenu == false) :
                echo $this->render('_nav_alert', ['menuItems' => $layoutSettings->alertMenu]);
            endif ?>
        </div>
    </div><!-- ./grid container -->
</div><!-- ./attached menu text -->

<?php $this->endBlock() ?>