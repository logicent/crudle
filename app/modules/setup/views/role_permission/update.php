<?php

use yii\helpers\Html;

$this->title = $model->name;

?>

<div class="role-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
