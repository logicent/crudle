<?php

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Email Queue'), 'url' => ['/setup/email-queue']];

?>

<div class="email-queue-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
