<?php

use yii\helpers\Inflector;

$context = $this->context;
$module = $this->context->module;

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', [
        'moduleName' => Inflector::camel2words(
            Inflector::id2camel($module->id)
        )
    ]),
    'url' => ['/app' .'/'. $module->id]
];
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{contextName}', [
        'contextName' => Inflector::camel2words(
            Inflector::id2camel($context->id)
        )
    ]),
    'url' => ['/app' .'/'. $module->id . '/' . $context->id]
] ?>
