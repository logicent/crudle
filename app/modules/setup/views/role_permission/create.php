<?php

$this->title = Yii::t('app', 'New Role');

?>

<div class="role-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
