<?php

$this->title = Yii::t('app', 'Report Builder');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];

$columns = [
];

echo $this->render('//_list/GridView', [
    'dataProvider'  => $dataProvider, 
    'searchModel'   => $searchModel,
    'columns'       => $columns
]) ?>