<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Format'), 'url' => ['/setup/print-format']];
?>

<div class="print-format-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
