<?php

use yii\helpers\Inflector;
use yii\helpers\Url;

$context = $this->context;
$module = $this->context->module;
$model = $this->context->model;

$this->title = $model->isNewRecord ? Yii::t('app', '{formTitle}', ['formTitle' => 'New ' . $context->resourceName]) : $model->id;

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camel2words(Inflector::id2camel($module->id))]),
    'url' => ['/app' .'/'. $module->id]
];
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{modelName}', ['modelName' => Inflector::camel2words(Inflector::id2camel($context->id))]),
    'url' => ['/app' .'/'. $module->id . '/' . $context->id]
] ?>