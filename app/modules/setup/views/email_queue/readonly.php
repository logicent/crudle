<?php

$this->title = Yii::t('app', '{title}', ['title' => $model->subject]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Email Queue'), 'url' => ['index']];

?>

<div class="email-queue-read">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
