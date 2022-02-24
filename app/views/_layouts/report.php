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

    <?= $this->render('/_layouts/_main_navbar', ['context' => $this->context]) ?>

    <?= $this->render('/_layouts/_report_header', ['context' => $this->context]) ?>

    <div class="main ui container">
        <!-- <div class="ui divider hidden"></div> -->

        <div class="ui stackable grid">
            <div id="report_content" class="sixteen wide column">
                <?= $content ?>
            </div>
        </div>
    </div>

    <div class="ui divider hidden"></div>

<?php $this->registerJs(<<<JS
    $('.ui.dropdown').dropdown();

    // $('.ui.accordion').accordion();

    $('.ui.sticky')
        .sticky({
            context: '#content'
        });
JS); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
