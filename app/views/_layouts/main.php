<?php

use yii\helpers\Html;
use app\assets\AppAsset;
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
        if ($this->context->id !== 'main' &&
            $this->context->id !== 'setup') :
            echo $this->render('//_layouts/_view_header', ['context' => $this->context]);
        endif ?>
    </div>

    <!-- <div class="main ui basic segment"> -->
    <div class="main ui container" 
        style="margin-top: <?= $this->context->id == 'main' || $this->context->id == 'setup' ? '84px;' : '124px;' ?>">
        <!-- <div class="ui divider hidden"></div> -->
        <div class="ui stackable grid">
            <?php if ( $this->context->id !== 'main' && $this->context->sidebar !== false ) : ?>
                <div class="computer only large screen only <?= $this->context->sidebarWidth ?> wide column">
                    <!-- <div class="ui rail"> -->
                        <div class="ui sticky">
                        <?php
                            // action id
                            if (    $this->context->action->id !== 'index'
                                &&  $this->context->action->id !== 'file-upload'
                            )
                            {
                                if (file_exists($this->context->viewPath . '/_sidebar.php')) {
                                    echo $this->context->renderPartial('_sidebar', ['context' => $this->context]);
                                }
                                else
                                    echo $this->context->renderPartial('//_form/_sidebar', ['context' => $this->context]);
                            }
                            // controller id
                            elseif ($this->context->id == 'report'
                                ||  $this->context->id == 'setup'
                            ) {
                                if (file_exists($this->context->viewPath . '/_sidebar.php')) {
                                    echo $this->context->renderPartial('_sidebar', ['context' => $this->context]);
                                }
                            }
                            // else {
                            //     echo $this->context->renderPartial('/_layouts/_sidebar', [
                            //         'reports' => [],
                            //         'context' => $this->context
                            //     ]);
                            // }
                            ?>
                        </div>
                    <!-- </div> -->
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
JS
);
    $this->endBody() ?>
    
    </body>
</html>

<?php $this->endPage() ?>
