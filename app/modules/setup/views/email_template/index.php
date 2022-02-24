<?php

$columns = [
    'inactive:boolean',
];

$controller = $this->context->id;

echo $this->render('/setup/_list/GridView', [
    'columns'       => $columns,
    'dataProvider'  => $dataProvider,
    'context_id'    => $controller . '/',
    'listTitle'     => $this->context->resourceName
]) ?>