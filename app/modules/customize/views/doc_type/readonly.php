<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocType */

$this->title = Yii::t('app', '{name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customize'), 'url' => ['/customize']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doc Type'), 'url' => ['/customize/doc-type']];
?>
<div class="doc-type-read">

    <?= $this->render('_form', [
        'model' => $model,
        'fieldDataProvider' => $fieldDataProvider,        
    ]) ?>

</div>
