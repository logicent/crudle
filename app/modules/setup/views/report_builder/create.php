<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Report Builder');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
?>

<div class="report-builder-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
