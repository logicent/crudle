<?php

use icms\FomanticUI\Elements;
use yii\helpers\Url;

$model = $this->context->getModel();

echo Elements::button(Elements::icon('left chevron'), [
    'class' => 'compact ui icon button',
    'title' => Yii::t('app', 'Previous'),
    'data' => [
        Url::to(['previous', 'id' => $model->id]),
    ]
]);
echo Elements::button(Elements::icon('right chevron'), [
    'class' => 'compact ui icon button',
    'title' => Yii::t('app', 'Next'),
    'data' => [
        Url::to(['next', 'id' => $model->id]),
    ]
]);