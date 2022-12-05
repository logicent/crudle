<?php

use yii\helpers\Html;

echo Html::hiddenInput('_model_class', null, ['class' => '-htmx-value']);
echo Html::hiddenInput('_modal_form_view', null, ['class' => '-htmx-value']);
echo Html::hiddenInput('_row_inputs_view', null, ['class' => '-htmx-value']);
// echo Html::hiddenInput('_row_inputs', null, ['class' => '-htmx-value']);
echo Html::hiddenInput('_row_values', null, ['class' => '-htmx-value']);
echo Html::hiddenInput('_row_counter', null, ['class' => '-htmx-value']);
