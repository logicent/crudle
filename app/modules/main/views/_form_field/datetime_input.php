<?php

use crudle\app\assets\Flatpickr;

Flatpickr::register($this);

$fieldOptions = array_merge([
    'class' => 'selected-date pikadaytime',
    'readonly' => $this->context->isReadonly()
], $options ?? []);
?>

<?= $form->field($model, $attribute)->textInput($fieldOptions) ?>

<?php $this->registerJs(<<<JS
    isReadonly = $('.selected-date').attr('readonly') == 'readonly';
    if (isReadonly)
        $('.selected-date').removeClass('pikaday');

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
        enableSeconds: true,
    });
JS);