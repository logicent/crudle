<?php

use crudle\app\main\assets\AppAsset;
use crudle\app\main\assets\HtmxAsset;
use crudle\app\setting\forms\LayoutSettingsForm;
use crudle\app\setting\models\Setup;
use yii\helpers\Html;

AppAsset::register($this);
HtmxAsset::register($this);

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

    <hgroup>
    <?php
        $controller = $this->context;
        $navbarView = $controller->pageNavbar();
        // load navbar in memory
        echo $this->render($navbarView, ['layoutSettings' => $layoutSettings]);
        // render navbar loaded above
        echo $this->blocks[$controller->pageNavbar()];
        // load view header if used
        if ($controller->showViewHeader()) :
            echo $this->render('@appMain/layouts/_nav/_view_header');
        endif ?>
    </hgroup>

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

<?php $this->endPage();
