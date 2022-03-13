<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '__'), 'url' => ['/__']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '__'), 'url' => ['/__']];
?>

<div class="--update">

    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

</div>
