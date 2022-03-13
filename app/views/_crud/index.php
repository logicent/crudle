<?php

$this->title = Yii::t('app', '__');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '__'), 'url' => ['/__']];

// To-Do: use
// $this->beginBlock('grid-columns');
$columns = [
];
// $this->endBlock();

echo $this->render('//_list/GridView', [
        'dataProvider'  => $dataProvider, 
        'searchModel'   => $searchModel,
        'columns'       => $columns
    ]) ?>
