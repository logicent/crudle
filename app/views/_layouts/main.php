<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use Zelenin\yii\SemanticUI\Elements;

// use Zelenin\yii\SemanticUI\collections\Message;

AppAsset::register($this);

$this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>

    <?php $this->beginBody() ?>

    <div id="header_wrapper">
    <?php
        echo $this->render('//_layouts/_main_navbar', ['context' => $this->context]);
        if ($this->context->id !== 'main') :
            echo $this->render('//_layouts/_view_header', ['context' => $this->context]);
        endif ?>
    </div>
    <?= $this->render('_main_sidebar') ?>

    <div class="main ui container pusher" style="margin-top: <?= $this->context->id == 'main' ? '103px;' : '133px;' ?>">
        <div class="ui stackable grid">
            <?php if ($this->context->id !== 'main' && $this->context->sidebar !== false) : ?>
                <div class="computer only large screen only <?= $this->context->sidebarWidth ?> wide column">
                    <!-- <div class="ui rail"> -->
                    <div class="ui sticky">
                    <?php
                        if ($this->context->id == 'report') :
                            echo $this->context->renderPartial('_sidebar', ['context' => $this->context]);
                        else :
                            if ($this->context->sidebar && $this->context->action->id == 'index'
                                // || $this->context->action->id !== 'file-upload'
                            ) :
                                echo $this->render('//_crud/_sidebar', ['context' => $this->context]);
                            endif;
                        endif;
                    ?>
                    </div>
                    <!-- </div>./ui rail -->
                </div>
            <?php endif ?>

            <div id="content" class="<?= $this->context->id !== 'main' && $this->context->sidebar !== false ? $this->context->mainWidth : $this->context->fullWidth ?> wide column">
                <?= $this->render('//_layouts/_flash_message', ['context' => $this->context]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>

    <div class="ui divider hidden"></div>
<?php
    $this->registerJs(<<<JS
    // $('.ui.accordion').accordion();

    $('.ui.sticky')
        .sticky({
            context: '#content'
        });
    JS);
    $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>
