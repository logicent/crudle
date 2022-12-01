<?php

use icms\FomanticUI\Elements;
use yii\helpers\Url;

$model = $this->context->getModel();

echo Elements::button(Elements::icon('print', ['class' => 'grey']), [
    'data' => [
        'method' => 'post',
        'url' => Url::to(['print-preview', 'id' => $model->id])
    ],
    'target' => '_blank',
]);
