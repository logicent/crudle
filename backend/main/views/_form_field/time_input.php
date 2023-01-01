<?php

use crudle\app\main\assets\Flatpickr;

Flatpickr::register($this);

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
JS);