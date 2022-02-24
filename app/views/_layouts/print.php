<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\PrintAsset;

AppAsset::register($this);
PrintAsset::register($this);

$this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>

    <?php $this->beginBody() ?>

        <div class="main ui container">
            <!-- <div class="ui stackable grid"> -->
                <div id="content" class="sixteen wide column">
                    <?= $content ?>
                </div>
            <!-- </div> -->
        </div>

    <?php $this->endBody() ?>
    <!-- remove HTML elements not needed in print view -->
    <?php
        $this->registerJs(<<<JS
            // form action buttons
            $('#form_action').remove();
            // dropdown fields in forms and form header
            // !! start keep the order of calls
            $('.ui.dropdown > .menu').remove();
            $('.ui.dropdown > .dropdown.icon').remove();
            $('#status_menu').removeClass('compact ui floating dropdown small button');
            $('.ui.dropdown > select').remove();
            // end keep the order of calls
            // field validation error message tags
            $('.ui.red.pointing.label').remove();
            // form buttons and icons (various)
            $('.ui.compact.tiny.button').remove();
            $('a > .delete.icon').remove();
            $('.ui.compact.mini.button').remove();
            $('a.del-input').remove();
            $('.ui.action.input').removeClass('action');
            $('.get-code').remove();
            // expand accordion form sections
            $('.ui.accordion.fluid > .content').addClass('active');
            // comments form
            $('.comment-form').remove();

            // TODO: implement better readonly mode using disabled segment to enhance this code
            // !! TODO: check if any key is pressed and do nothing instead or disable field div wrapper
            // $('input, textarea, .ui.dropdown > input').attr('readonly', true);
            // $('.ui.dropdown.search.selection').removeClass('selection');
            // $('.pikaday').removeClass();
            // $('#start_date, #end_date').attr('id', null);
        JS)
    ?>
    </body>
</html>

<?php $this->endPage() ?>
