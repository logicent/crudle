<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Format'), 'url' => ['/tool/print-format']];
?>

<div class="print-format-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
