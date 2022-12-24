<?php

use yii\helpers\Inflector;

$controller = $this->context;
$module = $controller->module;

$this->title = Yii::t('app', '{titleLabel}', ['titleLabel' => $controller->viewName()]);

$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', [
        'moduleName' => $module->moduleName
    ]),
    'url' => ['/app' .'/'. $module->id]
];
// $this->params['breadcrumbs'][] = [
//     'label' => Yii::t('app', '{contextName}', ['contextName' => Inflector::camel2words(Inflector::id2camel($controller->id))]),
//     'url' => ['/' . $module->id . '/' . $controller->id]
// ] ?>

<div class="<?= $controller->id ?>-update">

    <?= $this->render('_form', [
            // 'model' => $model,
        ]) ?>

</div>