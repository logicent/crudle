<?php

use crudle\app\main\enums\Resource_Action;
use crudle\app\main\enums\Type_Form_View;
use yii\helpers\Html;


if ($this->context->action->id == Resource_Action::Create ||
    $this->context->action->id == Resource_Action::Update ||
    $this->context->formViewType() == Type_Form_View::Single
) :
    echo Html::submitButton(Yii::t('app', 'Save'), [
            'class' => 'compact ui primary button',
            'style' => 'display: none;'
        ]);
endif;

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
JS)
?>
