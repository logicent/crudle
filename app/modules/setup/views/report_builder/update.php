<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Builder'), 'url' => ['index']];
?>

<div class="report-builder-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
