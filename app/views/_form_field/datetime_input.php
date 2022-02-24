<?php

use app\assets\FlatpickrAsset;

FlatpickrAsset::register($this);

?>

<?= $form->field($model, $attribute)->textInput([
        'class' => 'selected-date pikadaytime',
        'readonly' => $this->context->isReadonly,
    ]) ?>

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
JS) ?>