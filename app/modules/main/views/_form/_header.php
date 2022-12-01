<?php

use yii\helpers\Html;

echo Html::submitButton(Yii::t('app', 'Save'), [
        'class' => 'compact ui primary button',
        'style' => 'display: none;'
    ]);

$this->render('@appMain/views/_layouts/_flash_message', ['context' => $this->context]);

$this->registerJs(<<<JS
    $('.ui.dropdown').dropdown({
        // action: 'hide',
        // onChange: function(value, text, selectedItem) {
        //     console.log(value, text. selectedItem)
        // }
        // clearable : true,
        // values : listOptions, // get values from JS global var of listOptions
        // placeholder : 'Choose',
    });
JS);
