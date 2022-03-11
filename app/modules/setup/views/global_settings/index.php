<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'General Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
            'enctype' => 'multipart/form-data',
        ],
    ]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'shortName')->textInput() ?>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'location')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'contacts')->textarea(['rows' => 4]) ?>
        </div>
    </div>

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
    </div>

    <div class="ui attached padded segment">
        <div class="ui one column stackable grid">
            <div class="column center aligned">
                <?= Html::activeFileInput( $model->uploadForm, 'file_upload', [
                        'accept' => 'image/*', 'style' => 'display: none'
                    ]) ?>
                <?= Html::tag('div', Html::activeLabel($model, 'logoPath'), ['class' => 'field']) ?>
                <?= Html::activeHiddenInput($model, 'logoPath', ['id' => 'file_path', 'readonly' => true]) ?>
                <?= $this->render( '//_form_field/file_input', [
                        'attribute' => 'logoPath',
                        'model' => $model,
                    ]) ?>
            </div>
        </div>
    </div>
<?php
ActiveForm::end();
?>
