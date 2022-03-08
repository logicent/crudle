<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Layout Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$form = ActiveForm::begin([
        // 'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
            'enctype' => 'multipart/form-data',
        ],
    ]) ?>

    <div class="ui attached padded segment">

        <div class="two fields">
            <?= $form->field($model, 'homeButtonIcon')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'copyrightLabel')->textInput(['maxlength' => true]) ?>
        </div>
        <?= $form->field($model, 'pinMainSidebar')->checkbox() ?>
        <?= $form->field($model, 'hideCreateMenu')->checkbox() ?>
        <?= $form->field($model, 'hideSearchbar')->checkbox() ?>
        <?= $form->field($model, 'hideHelpMenu')->checkbox() ?>
        <?= $form->field($model, 'hideAlertMenu')->checkbox() ?>
        <?= $form->field($model, 'hideWebsiteLink')->checkbox() ?>
        <?= $form->field($model, 'showHelpInfo')->checkbox() ?>
    </div>
    <div class="ui bottom attached padded segment">
        <div class="ui one column stackable grid">
            <div class="column center aligned">
                <?= Html::activeFileInput( $model->uploadForm, 'file_upload', [
                        'accept' => 'image/*', 'style' => 'display: none'
                    ]) ?>
                <?= Html::tag('div', Html::activeLabel( $model, 'bgImagePath' ), [
                        'class' => 'field'
                    ]) ?>
                <?= Html::activeHiddenInput( $model, 'bgImagePath', [
                        'id' => 'file_path', 
                        'readonly' => true
                    ]) ?>
                <?= $this->render( '//_form_field/file_input', [
                        'attribute' => 'bgImagePath',
                        'model' => $model,
                    ]) ?>
                <div class="ui divider hidden"></div>
                <?= $form->field( $model, 'bgImageStyles' )->textarea([
                        'rows' => 1, 
                        'maxlength' => true
                    ]) ?>
            </div>
        </div>
    </div>

<?php
ActiveForm::end();
?>
