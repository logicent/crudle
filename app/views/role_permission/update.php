<?php

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['/people']];

?>

<div class="role-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
