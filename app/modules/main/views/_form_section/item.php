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
    'addUrl' => Url::to(['add-row']),
    'editUrl' => Url::to(['edit-row']),
    'getUrl' => Url::to(['get-row']),
    'deleteUrl' => Url::to(['delete-row']),
];

$this->registerJs(
    "var tableRow = "  . \yii\helpers\Json::htmlEncode($params) . ";",
    $this::POS_HEAD,
    'tableRow'
);

$this->registerJs($this->render('item/list.js'));
?>