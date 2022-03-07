<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customize'), 'url' => ['/customize']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Builder'), 'url' => ['/customize/report-builder']];
?>

<div class="report-builder-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
