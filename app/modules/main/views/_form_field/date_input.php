<?php

use crudle\app\assets\FlatpickrAsset;

FlatpickrAsset::register($this);

?>

<?= $form->field($model, $attribute)->textInput([
        'class' => 'selected-date pikaday',
        'readonly' => $this->context->isReadonly(),
    ]) ?>

<?php
$this->registerJs(<<<JS
    isReadonly = $('.selected-date').attr('readonly') == 'readonly';
    if (isReadonly)
        $('.selected-date').removeClass('pikaday');

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
JS) ?>