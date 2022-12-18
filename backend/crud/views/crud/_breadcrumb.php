<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

$context = $this->context;
$module = $this->context->module;

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', [
        'moduleName' => $module->moduleName
    ]),
    'url' => ['/app' .'/'. $module->id]
];
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{contextName}', [
        'contextName' => Inflector::camel2words(
            Inflector::id2camel(
                StringHelper::basename($context->id)
            )
        )
    ]),
    'url' => ['/app' .'/'. $module->id . '/' . StringHelper::basename($context->id)]
];