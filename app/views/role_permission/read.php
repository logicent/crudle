<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['/people']];

?>
<div class="role-view">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
