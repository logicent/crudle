<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

// $hasFileInput == isset($model->UploadForm);

$hintOptions = [
    'tag' => 'div',
    'class' => 'text-muted',
    'style' => 'font-size: 0.95em; padding-left: 0.25em'
];

$model = $this->context->getModel();

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'fieldConfig' => ['hintOptions' => $hintOptions],
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
        'enctype' => isset($model->uploadForm) ? 'multipart/form-data' : false,
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