<?php

$this->title = Yii::t('app', 'Email Template');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$columns = [
    'inactive:boolean',
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
    'dataProvider' => $dataProvider, 
    'searchModel' => $searchModel,
    'columns'       => $columns
]) ?>
