<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', '{listLabel}', ['listLabel' => $this->context->viewName()]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camelize($this->context->module->id)]),
    'url' => ['/' . $this->context->module->id]
];
