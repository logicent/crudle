<?php

use yii\helpers\Inflector;

$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camel2words(Inflector::id2camel($this->context->module->id))]),
    'url' => ['/' . $this->context->module->id]
];
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{modelName}', ['modelName' => Inflector::camel2words(Inflector::id2camel($this->context->id))]),
    'url' => ['/' . $this->context->module->id . '/' . $this->context->id]
] ?>

<div class="<?= $this->context->id ?>-read">

    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

</div>
