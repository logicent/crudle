<?php

$this->title = Yii::t('app', 'Data Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Model'), 'url' => ['/setup/doc-type']];

$columns = [
    'module',
    'is_table:boolean'
];

echo $this->render('//_list/GridView', [
    'dataProvider' => $dataProvider, 
    'searchModel' => $searchModel,
    'columns'       => $columns
]) ?>