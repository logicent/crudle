<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'General Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$form = ActiveForm::begin([
        // 'id' => $model->formName(),
        'options' => [
            'autocomplete' => 'off',
            'class' => 'ui form',
        ],
    ]) ?>

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
<?php
ActiveForm::end();
?>
