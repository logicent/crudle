<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

?>

<div class="role-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
