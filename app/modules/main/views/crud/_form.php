<?php

use yii\helpers\Url;
use Zelenin\yii\SemanticUI\widgets\ActiveForm;

$hintOptions = [
    'tag' => 'div',
    'class' => 'text-muted',
    'style' => 'font-size: 0.95em; padding-left: 0.25em'
];
$hasFileInput = isset($model->uploadForm);
// $isReadonly = $this->context->isReadonly();

$form = ActiveForm::begin([
    'id' => $model->formName(),
    // 'action' => $isReadonly ? false : Url::to([$this->context->action->id]),
    'enableClientValidation' => true,
    'fieldConfig' => ['hintOptions' => $hintOptions],
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
        'enctype' => $hasFileInput ? 'multipart/form-data' : false,
    ],
]);
    echo $this->render('@app_main/views/_form/_header', ['model' => $model]);
    // insert page/route-specific form view input fields
    echo $this->renderFile($this->context->viewPath . '/field_inputs.php', [
            'form' => $form,
            'model' => $model
        ]);
ActiveForm::end();
echo $this->render('@app_main/views/_form/_footer', ['model' => $model]);

// insert the ajax script if applicable
// $this->registerJs($this->render('@app_main/views/_form/_modal_submit.js'));

// additional form view js scripts
$this->registerJs(<<<JS
//  form view javascript
JS);