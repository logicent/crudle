<?php

use Zelenin\yii\SemanticUI\widgets\ActiveForm;

// $hasFileInput == isset($model->UploadForm);

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableClientValidation' => true,
    'options' => [
        'autocomplete' => 'off',
        'class' => 'ui form',
        // 'enctype' => 'multipart/form-data,
    ],
]);

    echo $this->renderFile($this->context->viewPath . '/field_inputs.php', ['form' => $form, 'model' => $model]);

ActiveForm::end();

echo $this->render('//_form/_footer', ['model' => $model]);
// $this->registerJs($this->render('//_form/_modal_submit.js'));

$this->registerJs(<<<JS
//  form view javascript
JS);