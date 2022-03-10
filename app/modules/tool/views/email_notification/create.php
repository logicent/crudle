<?php

$this->title = Yii::t('app', 'New Email Notification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];

?>

<div class="email-notification-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>