<?php

use icms\FomanticUI\modules\Checkbox;

$defaultOptions = [
    'style' => 'vertical-align: text-top'
];
$options = isset($options) ? array_merge($defaultOptions, $options) : $defaultOptions;
?>

<?= Checkbox::widget([
    'model' => $model,
    'attribute' => $attribute,
    'labelOptions' => isset($labelOptions) ? $labelOptions : [],
    'inputOptions' => ['data' => ['name' => $attribute]],
    'options' => $options
]);
