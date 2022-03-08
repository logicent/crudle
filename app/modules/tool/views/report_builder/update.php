<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Builder'), 'url' => ['/tool/report-builder']];
?>

<div class="report-builder-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
