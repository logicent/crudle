<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Format'), 'url' => ['index']];
?>

<div class="print-format-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
