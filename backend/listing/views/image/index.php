<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', '{listTitle}', ['listTitle' => $context->listName()]);

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', [
        'moduleName' => Inflector::camel2words(
            Inflector::id2camel($module->id)
        )
    ]),
    'url' => ['/' . $module->id]
];
