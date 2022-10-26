<?php

use crudle\app\assets\Flatpickr;
use yii\helpers\Html;

Flatpickr::register($this);

$defaultOptions = [
    'class' => 'selected-date pikaday',
    // 'readonly' => $this->context->isReadonly() ? 'readonly' : false,
];
$options = isset($options) ? array_merge($defaultOptions, $options) : $defaultOptions;

if (isset($form)) :
    $field = $form->field($model, $attribute)->textInput($options);
else :
    $field = Html::activeTextInput($model, $attribute, $options);
endif;

echo $field;

$this->registerJs(<<<JS
    // isReadonly = $('.selected-date').attr('readonly') == 'readonly';
    // if (isReadonly)
    //     $('.selected-date').removeClass('pikaday');

    $('.pikaday').flatpickr({
        // minDate : null,
        // maxDate : null,
        // altInput : true,
        // allowInput : false,
        // clickOpens : true,
        // shorthandCurrentMonth : false,
        // time_24hr : false
        // weekNumbers : false
    });
JS);
