<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Style'), 'url' => ['index']];
?>

<div class="print-style-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
