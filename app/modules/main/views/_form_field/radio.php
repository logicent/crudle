<?php

use icms\FomanticUI\modules\Radio;

?>

<br>
<?= Radio::widget([
    'model' => $model,
    'attribute' => $attribute,
    'labelOptions' => isset($labelOptions) ? $labelOptions : [],
    'inputOptions' => ['data' => ['name' => $attribute]],
    'options' => [
        'style' => 'vertical-align: text-top'
    ]
]);