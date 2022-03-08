<?php

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Email Queue'), 'url' => ['/tool/email-queue']];

?>

<div class="email-queue-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
