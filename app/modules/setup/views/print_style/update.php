<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Style'), 'url' => ['/setup/print-style']];
?>

<div class="print-style-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
