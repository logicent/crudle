<?php

$this->title = Yii::t('app', 'Doc Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customize'), 'url' => ['/customize']];
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doc Type'), 'url' => ['/customize/doc-type']];

$columns = [
    'module',
    'is_table:boolean'
];

echo $this->render('//_list/GridView', [
    'dataProvider' => $dataProvider, 
    'searchModel' => $searchModel,
    'columns'       => $columns
]) ?>