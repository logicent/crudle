<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

// $hasFileInput == isset($model->UploadForm);

// $hintOptions = [
//     'tag' => 'span',
//     'class' => 'text-muted',
//     'style' => 'font-size: 0.95em;'
// ];

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    // 'fieldOptions' => [
    // ],
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
        // 'enctype' => 'multipart/form-data,
    ],
]);
    echo $this->render('//_form/_header', ['model' => $model]);
    // insert page/route-specific form view input fields
    echo $this->renderFile($this->context->viewPath . '/field_inputs.php', [
            'form' => $form,
            'model' => $model
        ]);
ActiveForm::end();
echo $this->render('//_form/_footer', ['model' => $model]);

// insert the ajax script if applicable
// $this->registerJs($this->render('//_form/_modal_submit.js'));

// additional form view js scripts
$this->registerJs(<<<JS
//  form view javascript
JS);