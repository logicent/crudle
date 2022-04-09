<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

// $hasFileInput == isset($model->UploadForm);

$hintOptions = [
    'tag' => 'div',
    'class' => 'text-muted',
    'style' => 'font-size: 0.95em;'
];

$model = $this->context->model;

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'fieldConfig' => ['hintOptions' => $hintOptions],
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
        'enctype' => 'multipart/form-data',
    ],
]);
    echo $this->render('@app_main/views/_form/_header', ['model' => $model]);

    echo $this->renderFile($this->context->viewPath . '/field_inputs.php', [
            'form' => $form,
            'model' => $model
        ]);
ActiveForm::end();

// $this->registerJs($this->render('@app_main/views/_form/_modal_submit.js'));
// $this->registerJs($this->render('@app_main/views/_form/_submit.js'));

$this->registerJs(<<<JS
//  form view javascript
JS);