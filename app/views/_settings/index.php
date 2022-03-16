<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', '{titleLabel}', ['titleLabel' => $this->context->resourceName]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camel2words(Inflector::id2camel($this->context->module->id))]),
    'url' => ['/' . $this->context->module->id]
];
// $this->params['breadcrumbs'][] = [
//     'label' => Yii::t('app', '{contextName}', ['contextName' => Inflector::camel2words(Inflector::id2camel($this->context->id))]),
//     'url' => ['/' . $this->context->module->id . '/' . $this->context->id]
// ] ?>

<div class="<?= $this->context->id ?>-update">

    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

</div>
