<?php

use yii\helpers\Url;

$columnHeaders = require Yii::getAlias($listColumns . '.php');

echo $this->render('item/list', [
        'model' => $model,
        'detailModels' => $detailModels,
        'form' => $form,
        'formView' => $formView,
        'columnHeaders' => $columnHeaders,
        'listId' => $listId,
    ]);

$params = [
    'formId' => strtolower($model->formName()),
    'section' => '#' . $listId,
    'table' => '#' . $listId . ' table',
    'addItemUrl' => Url::to(['add-item']),
    'editItemUrl' => Url::to(['edit-item']),
    'getItemUrl' => Url::to(['get-item']),
    'deleteItemUrl' => Url::to(['delete-item']),
];

$this->registerJs(
    "var itemRow = "  . \yii\helpers\Json::htmlEncode($params) . ";",
    $this::POS_HEAD,
    'itemRow'
);

$this->registerJs($this->render('item/list.js'));
?>