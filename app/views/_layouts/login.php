<?php

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div id="site_header">
        <?= $this->render('/_layouts/_site_navbar', ['context' => $this->context]) ?>
    </div>

    <div id="login_wrapper">
        <div class="ui container">
            <?= $content ?>
        </div>
    </div>

    <div class="ui divider hidden"></div>

    <?php $this->registerCssFile("@web/css/login.css") ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
