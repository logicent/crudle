<?php

use crudle\app\assets\Flatpickr;
use yii\helpers\Html;

Flatpickr::register($this);

$fieldOptions = array_merge([
    'class' => 'selected-date pikadaytime',
    // 'readonly' => $this->context->isReadonly() ? 'readonly' : false,
], $options ?? []);

if (isset($form)) :
    $field = $form->field($model, $attribute)->textInput($fieldOptions);
else :
    $field = Html::activeTextInput($model, $attribute, $fieldOptions);
endif;

echo $field;

$this->registerJs(<<<JS
    // isReadonly = $('.selected-date').attr('readonly') == 'readonly';
    // if (isReadonly)
    //     $('.selected-date').removeClass('pikadaytime');

    $('.pikadaytime').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
        enableTime: true,
        minuteIncrement: 1,
        enableSeconds: false,
    });
JS);
