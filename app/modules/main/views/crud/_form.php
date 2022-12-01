<?php

use crudle\app\main\enums\Resource_Action;
use crudle\app\main\enums\Type_Form_View;
use yii\helpers\Url;
use icms\FomanticUI\widgets\ActiveForm;

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
    if (
        $this->context->action->id == Resource_Action::Create
        || $this->context->action->id == Resource_Action::Update
        || $this->context->formViewType() == Type_Form_View::Single
    ) :
        echo $this->render('@appMain/views/_form/_header', ['model' => $model]);
    endif;
    // insert page/route-specific form view input fields
    if (method_exists($model, 'fieldInputs')) :
        echo $this->render('_field_inputs', ['model' => $model, 'form' => $form]);
    else:
        echo $this->renderFile($this->context->viewPath . '/field_inputs.php', [
                'form' => $form,
                'model' => $model
            ]);
    endif;
ActiveForm::end();
echo $this->render('@appMain/views/_form/_footer', ['model' => $model]);

// insert the ajax script if applicable
// $this->registerJs($this->render('@appMain/views/_form/_modal_submit.js'));

// additional form view js scripts
$this->registerJs(<<<JS
//  form view javascript
JS);
