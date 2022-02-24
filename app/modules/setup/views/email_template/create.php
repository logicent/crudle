<?php

$this->title = Yii::t('app', 'New Email Template');
?>

<div class="email-template-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
