<?php

$this->title = Yii::t('app', 'New Print Format');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
?>

<div class="print-format-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
