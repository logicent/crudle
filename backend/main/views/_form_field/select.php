<?php

use crudle\app\crud\helpers\SelectableItems;
use icms\FomanticUI\modules\Select;
use yii\helpers\Html;


$items = SelectableItems::get(
    $list['modelClass'],
    $model,
    [
        'keyAttribute' => $list['keyAttribute'],
        'valueAttribute' => $list['valueAttribute'],
        'groupAttribute' => $list['groupAttribute'] ?? null,
        'filters' => $list['filters'] ?? [],
        'join' => $list['join'] ?? null,
        'alias' => $list['alias'] ?? null,
        'displayLabel' => $list['displayLabel'] ?? null,
        'addEmptyFirstItem' => $list['addEmptyFirstItem'] ?? false
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
    // $field = Select::widget([
    //     'model' => $model,
    //     'attribute' =>  $attribute,
    //     'items' => $items,
    //     // 'search' => false,
    //     'options' => $options 
    // ]);
endif;

echo $field;
