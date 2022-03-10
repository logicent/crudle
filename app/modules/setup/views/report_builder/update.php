<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Builder'), 'url' => ['/setup/report-builder']];
?>

<div class="report-builder-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
