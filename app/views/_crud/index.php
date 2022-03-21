<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', '{listTitle}', ['listTitle' => $this->context->resourceName]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camelize($this->context->module->id)]),
    'url' => ['/' . $this->context->module->id]
];

$searchForm = $this->context->viewPath . '/_search.php';
if (file_exists($searchForm)) : ?>
    <div style="display: none;" id="list_header" class="ui basic segment filters">
        <?= $this->render('_search', ['searchModel' => $searchModel]) ?>
    </div>
<?php endif;

$columns = require $this->context->viewPath . '/list_columns.php';

echo $this->render('//_list/GridView', [
        'dataProvider'  => $dataProvider, 
        'searchModel'   => $searchModel,
        'columns'       => $columns
    ]) ?>
