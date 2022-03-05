<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocTypeField */

$this->title = Yii::t('app', '{label}', [
    'label' => $model->label,
]);
$this->params['breadcrumbs'][] = ['label' => $model->label, 'url' => ['view', 'name' => $model->name, 'doc_type' => $model->doc_type]];
?>
<div class="doc-type-field-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
