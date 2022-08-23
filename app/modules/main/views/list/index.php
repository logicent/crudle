<?php

use yii\helpers\Inflector;

$context = $this->context;
$module = $this->context->module;

$this->title = Yii::t('app', '{listTitle}', ['listTitle' => $context->viewName()]);

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', [
        'moduleName' => Inflector::camel2words(
            Inflector::id2camel($module->id)
        )
    ]),
    'url' => ['/' . $module->id]
];

$searchForm = $context->viewPath . '/_search.php';
if (file_exists($searchForm)) : ?>
    <div style="display: none;" id="list_header" class="ui basic segment filters">
        <?= $this->render('_search', ['searchModel' => $searchModel]) ?>
    </div>
<?php endif;

$checkboxColumn = require '_checkboxColumn.php';
$linkColumn = require '_linkColumn.php';
$statusColumn = require '_statusColumn.php';
$columns = require $context->viewPath . '/list_columns.php';
$idColumn = require '_idColumn.php';
$tsColumn = require '_tsColumn.php';

echo
    $this->render('GridView', [
        'dataProvider'  => $dataProvider, 
        'searchModel'   => $searchModel,
        'checkboxColumn'=> $checkboxColumn,
        'linkColumn'    => $linkColumn,
        'statusColumn'  => $statusColumn,
        'columns'       => $columns,
        'idColumn'      => $idColumn,
        'tsColumn'      => $tsColumn,
    ]) ?>
