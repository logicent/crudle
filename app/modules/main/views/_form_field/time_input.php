<?php

use crudle\app\assets\FlatpickrAsset;

FlatpickrAsset::register($this);

?>

<?= $form->field($model, $attribute)->textInput([
        'class' => 'selected-date pikaday'
    ]) ?>

<?php $this->registerJs(<<<JS
    $('.pikaday').flatpickr({
        enableTime: true,
        minuteIncrement: 1,
        enableSeconds: true,
    });
JS) ?>