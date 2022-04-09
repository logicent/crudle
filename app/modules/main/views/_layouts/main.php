<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\modules\main\enums\Type_Form_View;
use app\modules\main\enums\Type_View;
use app\modules\setup\models\LayoutSettingsForm;
use app\modules\setup\models\Setup;

AppAsset::register($this);

$layoutSettings = Setup::getSettings( LayoutSettingsForm::class );

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
        $controller = $this->context;
        echo $this->render('@app_main/views/_layouts/_navbar_main', ['layoutSettings' => $layoutSettings]);
        if ($controller->id !== 'dashboard') :
            echo $this->render('@app_main/views/_layouts/_view_header', ['context' => $controller]);
        endif ?>
    </div>
    <?= $this->render('_main_sidebar') ?>

    <div class="main ui container pusher" style="margin-top: <?= $controller->id == 'dashboard' ? '103px;' : '133px;' ?>">
        <div class="ui stackable grid">
            <?php if ($controller->id !== 'main' && $controller->showViewSidebar()) : ?>
                <div class="computer only large screen only <?= $controller->sidebarColWidth() ?> wide column">
                    <!-- <div class="ui rail"> -->
                    <div class="ui sticky">
                    <?php
                        if ($controller->currentViewType() == Type_View::List ||
                            $controller->formViewType() == Type_Form_View::Single) :
                            echo $this->render('@app_main/views/_crud/_sidebar');
                        else :
                            if (file_exists($controller->viewPath . '/_sidebar.php')) :
                                echo $this->renderFile($controller->viewPath . '/_sidebar.php');
                            endif;
                        endif;
                    ?>
                    </div>
                    <!-- </div>./ui rail -->
                </div>
            <?php endif ?>

            <div id="content"
                class="<?= $controller->id !== 'main' && $controller->showViewSidebar() ?
                    $controller->mainColumnWidth() : $controller->fullColumnWidth() ?> wide column">
                <?= $this->render('@app_main/views/_layouts/_flash_message', ['context' => $controller]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>

    <div class="ui divider hidden"></div>
<?php
    $this->endBody();

    $this->registerJs(<<<JS
    $('.ui.sticky')
        .sticky({
            context: '#content'
        });
    JS) ?>

    </body>
</html>

<?php $this->endPage() ?>
