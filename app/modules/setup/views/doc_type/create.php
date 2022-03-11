<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocType */

$this->title = Yii::t('app', 'New Data Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Model'), 'url' => ['/setup/doc-type']];

?>
<div class="doc-type-create">

    <?= $this->render('_form', [
        'model' => $model,
        'fieldDataProvider' => $fieldDataProvider,
    ]) ?>

</div>
