<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'General Settings');

$form = ActiveForm::begin([
        // 'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
            'enctype' => 'multipart/form-data',
        ],
    ]) ?>

    <?= $this->render('//_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'defaultLanguage')->dropDownList([], ['disabled' => true]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'firstDayOfTheWeek')->dropDownList(['sun' => 'Sun', 'mon' => 'Mon'], ['disabled' => true]) ?>
            <?= $form->field($model, 'defaultTimeZone')->dropDownList([], ['disabled' => true]) ?>
        </div>
        <div class="two fields">
            <?= $form->field($model, 'defaultDateFormat')->textInput(['readonly' => true, 'class' => 'datePicker']) ?>
            <?= $form->field($model, 'defaultTimeFormat')->textInput(['readonly' => true, 'class' => 'timePicker']) ?>
        </div>
        <?= $form->field($model, 'showViewCaptions')->checkbox() ?>
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
