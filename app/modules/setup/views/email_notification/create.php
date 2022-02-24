<?php

$this->title = Yii::t('app', 'New Email Notification');
?>

<div class="email-notification-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
