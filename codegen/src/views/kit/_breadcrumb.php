<?php

use yii\helpers\Inflector;

$context = $this->context;

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{contextName}', ['contextName' => Inflector::camel2words(Inflector::id2camel($context->id))]),
    'url' => ['/kit/kit/index']
] ?>