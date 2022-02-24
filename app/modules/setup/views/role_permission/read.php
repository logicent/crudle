<?php

$this->title = Yii::t('app', $model->id);
?>
<div class="role-view">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
