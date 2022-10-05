<?php

use crudle\app\helpers\SelectableItems;
use icms\FomanticUI\modules\Select;
use yii\helpers\Html;


$items = SelectableItems::get(
    $list['modelClass'],
    $model,
    [
        'keyAttribute' => $list['keyAttribute'],
        'valueAttribute' => $list['valueAttribute'],
        'filters' => $list['filters'] ?? [],
        'join' => $list['join'] ?? null,
        'alias' => $list['alias'] ?? null,
        'displayLabel' => $list['displayLabel'] ?? null,
    ]
);
$options = $options ?? [];

if (isset($form)) :
    $field = $form->field($model, $attribute)->widget(Select::class, [
        'search' => true,
        'items' => $items,
        'options' => $options
    ]);
else :
    $field = Html::activeDropDownList($model, $attribute, $items, $options);
endif;

echo $field;
