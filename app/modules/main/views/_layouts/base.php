<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use crudle\setup\models\LayoutSettingsForm;
use crudle\setup\models\Setup;

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
<?php
    $this->beginBody() ?>

    <div id="header_wrapper">
    <?php
        $controller = $this->context;
        // $layoutPath = '@app_main/views/_layouts/';
        // $navbarView = $layoutPath . $controller->pageNavbar();
        $navbarView = $controller->pageNavbar();
        // load navbar in memory
        echo $this->render($navbarView, ['layoutSettings' => $layoutSettings]);
        // render navbar loaded above
        echo $this->blocks[$controller->pageNavbar()];
        // load view header if used
        if ($controller->showViewHeader()) :
            // echo $this->render($layoutPath . '_view_header');
            echo $this->render('@app_main/views/_layouts/_view_header');
        endif ?>
    </div>

    <?= $content ?>
<?php
    $this->endBody();

    $this->registerJs(<<<JS
        $('.ui.dropdown').dropdown();
        $('.ui.sticky').sticky({
                context: '#content'
            });
    JS) ?>
    </body>
</html>

<?php $this->endPage() ?>