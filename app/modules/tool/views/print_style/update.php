<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Style'), 'url' => ['/tool/print-style']];
?>

<div class="print-style-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
