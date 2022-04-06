<?php

use yii\helpers\Html;

?>

<div class="ui attached padded segment">
    <div class="ui two column grid">
        <div class="column">
            <?= $form->field($model, 'homeButtonIcon')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'pinMainSidebar')->checkbox() ?>
            <?= $form->field($model, 'hideSearchbar')->checkbox() ?>
            <?= $form->field($model, 'hideWebsiteLink')->checkbox() ?>
            <?= $form->field($model, 'showHelpInfo')->checkbox() ?>
        </div>
        <div class="column">
            <?= $form->field($model, 'copyrightLabel')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'hideCreateMenu')->checkbox() ?>
            <?= $form->field($model, 'hideHelpMenu')->checkbox() ?>
            <?= $form->field($model, 'hideAlertMenu')->checkbox() ?>
            <?= $form->field($model, 'allowUserPreference')->checkbox() ?>
        </div>
    </div>
</div>
<!-- <div class="ui centered header attached segment">
    <div class="text-muted"><?php //= Yii::t('app', 'App Sidebar') ?></div>
</div>
<div class="ui attached padded segment">
    <?php //= $this->render('_menu/list_columns') ?>
</div> -->
<div class="ui centered header attached segment">
    <div class="text-muted"><?= Yii::t('app', 'Dashboard Shortcut Menu') ?></div>
</div>
<div class="ui attached padded segment">
    <?= $this->render('_menu/list_columns') ?>
</div>
<div class="ui centered header attached segment">
    <div class="text-muted"><?= Yii::t('app', 'Create Menu') ?></div>
</div>
<div class="ui attached padded segment">
    <?= $this->render('_menu/list_columns') ?>
</div>
<div class="ui centered header attached segment">
    <div class="text-muted"><?= Yii::t('app', 'Help Menu') ?></div>
</div>
<div class="ui attached padded segment">
    <?= $this->render('_menu/list_columns') ?>
</div>
<div class="ui centered header attached segment">
    <div class="text-muted"><?= Yii::t('app', 'Alert Menu') ?></div>
</div>
<div class="ui attached padded segment">
    <?= $this->render('_menu/list_columns') ?>
</div>
<div class="ui centered header attached segment">
    <div class="text-muted"><?= Yii::t('app', 'Background Image') ?></div>
</div>
<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column center aligned">
            <?= $this->render( '@app_main/views/_form_field/file_input', [
                    'attribute' => 'bgImagePath',
                    'model' => $model,
                    'form' => $form,
                ]) ?>
        </div>
        <div class="column">
            <?= $form->field( $model, 'bgImageStyles' )->textarea([
                    'rows' => 10,
                    'style' => 'height: 299px !important',
                    'maxlength' => true
                ]) ?>
        </div>
    </div>
</div>