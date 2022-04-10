<?php

// Item list

use yii\helpers\Url;

echo $this->render('item/list', ['model' => $model, 'form' => $form]);

$params = [
    'formId' => strtolower($model->formName()),

    'section' => '#_item',
    'table' => '#_item table',
    'addItemUrl' => Url::to(['add-item']),
    'editItemUrl' => Url::to(['edit-item']),
    'getItemUrl' => Url::to(['get-item']),
    'deleteItemUrl' => Url::to(['delete-item']),
];

$this->registerJs(
    "var itemDoc = "  . \yii\helpers\Json::htmlEncode($params) . ";",
    $this::POS_HEAD,
    'itemDoc'
);

$this->registerJs($this->render('item/list.js'));
?>