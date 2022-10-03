<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$viewPath = $this->context->viewPath;
$listId = Inflector::underscore(StringHelper::basename($modelClass));
$model = new $modelClass;

echo $this->render('item/list', [
        'listId' => $listId,
        'modelClass' => $modelClass,
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
