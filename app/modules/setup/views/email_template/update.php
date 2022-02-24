<?php

$this->title = Yii::t('app', $model->id);
?>
<div class="email-template-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
