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
]) ?>

<!-- 
    form input fields
 -->

<?php
ActiveForm::end();

echo $this->render('//_form/_footer', ['model' => $model]);

$this->registerJs(<<<JS
//  form view javascript
JS);