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
<div class="ui bottom attached padded segment">
    <div class="ui two column stackable grid">
        <div class="column center aligned">
            <?= Html::tag('div', Html::activeLabel( $model, 'bgImagePath' ), [
                    'class' => 'field',
                    'style' => 'margin: 0em;'
                ]) ?>
            <?= $this->render( '//_form_field/file_input', [
                    'attribute' => 'bgImagePath',
                    'model' => $model,
                ]) ?>
            <?= Html::activeFileInput( $model->uploadForm, 'file_upload', [
                    'accept' => 'image/*', 'style' => 'display: none'
                ]) ?>
            <?= Html::activeHiddenInput( $model, 'bgImagePath', [
                    'id' => 'file_path', 
                    'readonly' => true
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