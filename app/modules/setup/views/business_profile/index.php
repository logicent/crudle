<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$this->title = Yii::t('app', 'Business Profile');

$form = ActiveForm::begin([
            'id' => $model->formName(),
            'options' => [
                'autocomplete' => 'off',
                'class' => 'ui form',
                'enctype' => 'multipart/form-data',
            ]
        ]) ?>

    <?= $this->render('//_form/_modal_header', ['model' => $model]) ?>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'short_name')->textInput() ?>
        </div>
    </div>

    <div class="ui attached padded segment">
        <div class="two fields">
            <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'contacts')->textarea(['rows' => 6]) ?>
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
