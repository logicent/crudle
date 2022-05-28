<?php

use Zelenin\yii\SemanticUI\modules\Checkbox;
?>

<?= Checkbox::widget([
        'model' => $model,
        'attribute' => $attribute,
        'labelOptions' => ['label' => false],
        'inputOptions' => ['data' => ['name' => $attribute]],
        'options' => [
            'style' => 'vertical-align: text-top'
        ]
    ]) ?>