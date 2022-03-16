<?php

use yii\helpers\Inflector;

$this->title = Yii::t('app', '{newLabel}', ['newLabel' => $this->context->resourceName]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', '{moduleName}', ['moduleName' => Inflector::camelize($this->context->module->id)]),
    'url' => ['/' . $this->context->module->id]
] ?>

<div class="<?= $this->context->id ?>-create">

    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

</div>
