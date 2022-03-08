<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', 'Email Notification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];

$columns = [
];

$controller = $this->context->id;

echo $this->render('//_list/GridView', [
    'dataProvider' => $dataProvider, 
    'searchModel' => $searchModel,
    'columns'       => $columns
]) ?>
