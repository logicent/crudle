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

    <?= $this->render('/_layouts/_navbar_main', ['context' => $this->context]) ?>

    <?= $this->render('/_layouts/_view_header', ['context' => $this->context]) ?>

    <div class="report"><!-- ui container -->
        <div class="ui stackable two column grid">
            <div class="three wide column">
                <?= $this->context->renderPartial('_sidebar', ['context' => $this->context]) ?>
            </div>
            <div id="content" class="thirteen wide column">
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
