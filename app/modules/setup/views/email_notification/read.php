<?php

$this->title = Yii::t('app', $model->id);
?>

<div class="email-notification-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
