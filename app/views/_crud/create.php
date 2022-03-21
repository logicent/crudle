<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', '{formTitle}', ['formTitle' => 'New ' . $this->context->resourceName]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camelize($this->context->module->id)]),
    'url' => ['/' . $this->context->module->id]
];
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{modelName}', ['modelName' => Inflector::camel2words(Inflector::camelize($this->context->id))]),
    'url' => ['/' . $this->context->module->id . '/' . $this->context->id]
] ?>

<div class="<?= $this->context->id ?>-create">

    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

</div>
