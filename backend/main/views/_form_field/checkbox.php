<?php

use icms\FomanticUI\modules\Checkbox;
?>

<!-- <br> -->
<?= Checkbox::widget([
    'model' => $model,
    'attribute' => $attribute,
    'labelOptions' => isset($labelOptions) ? $labelOptions : [],
    'inputOptions' => ['data' => ['name' => $attribute]],
    'options' => [
        'style' => 'vertical-align: text-top'
    ]
]);
