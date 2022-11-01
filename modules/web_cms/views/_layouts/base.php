<?php

use crudle\app\assets\AppAsset;
use crudle\app\assets\HtmxAsset;
use crudle\app\setup\models\Setup;
use crudle\ext\web_cms\models\WebsiteSettingsForm;
use yii\helpers\Html;

AppAsset::register($this);
HtmxAsset::register($this);

$websiteSettings = Setup::getSettings( WebsiteSettingsForm::class );

$this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <!-- Standard Meta -->
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <!-- Site Properties -->
        <?= $this->registerCss($this->render('@extCms/views/_assets/site.css')) ?>
        <?= $this->registerJs($this->render('@extCms/views/_assets/site.js')) ?>

        <?php $this->head() ?>
    </head>

    <body>
<?php
    $this->beginBody() ?>

    <?= $content ?>
<?php
    $this->endBody();

    // $this->registerJs(<<<JS
    // JS) ?>
    </body>
</html>

<?php $this->endPage();