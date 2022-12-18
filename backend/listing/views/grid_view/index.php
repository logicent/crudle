<?php

use yii\helpers\Inflector;

$context = $this->context;
$module = $this->context->module;

$this->title = Yii::t('app', '{listTitle}', ['listTitle' => $context->viewName()]);

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', [
        'moduleName' => $module->moduleName
    ]),
    'url' => ['/' . $module->id]
];

$searchForm = $context->viewPath . '/_search.php';
if (file_exists($searchForm)) : ?>
    <div style="display: none;" id="list_header" class="ui basic segment filters">
        <?= $this->render('_search', ['searchModel' => $searchModel]) ?>
    </div>
<?php endif;

$checkboxColumn = require '_column/checkbox.php';
$linkColumn = require '_column/link.php';
$statusColumn = require '_column/status.php';
$listColumns = require $context->viewPath . '/list_columns.php';
$idColumn = require '_column/id.php';
$tsColumn = require '_column/ts.php';

echo
    $this->render('GridView', [
        'dataProvider'  => $dataProvider, 
        'searchModel'   => $searchModel,
        'checkboxColumn'=> $checkboxColumn,
        'linkColumn'    => $linkColumn,
        'statusColumn'  => $statusColumn,
        'viewColumns'   => $listColumns,
        'idColumn'      => $idColumn,
        'tsColumn'      => $tsColumn,
    ]);
