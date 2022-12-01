<?php

use icms\FomanticUI\Elements;

$model = $this->context->getModel();

echo Elements::button(Yii::t('app', 'Save'), [
    'class' => 'compact primary',
    'id'    => 'save_btn',
]);

$this->registerJs(<<<JS
    $('#save_btn').on('click', function(e) {
        $('.ui.form button[type="submit"]').click();
    });
JS);
