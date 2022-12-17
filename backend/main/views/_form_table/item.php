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

$listParams = [
    'el_form_id' => strtolower($model->formName()), // ? to check if needed
    'sl_table_div' => '#' . $listId,
    'sl_table' => '#' . $listId . ' table',
    'add_row_url' => Url::to(['add-row']),
    'edit_row_url' => Url::to(['edit-row']),
    'find_item_url' => Url::to(['find-item']),
    'delete_row_url' => Url::to(['delete-row']),
];

$this->registerJs(
    "var js_listParams = "  . \yii\helpers\Json::htmlEncode($listParams) . ";",
    $this::POS_HEAD,
    // $listParams['el_form_id']
);
// !! Testing own AJAX vs. HTMX AJAX performance
$this->registerJs($this->render('item/list.js'));