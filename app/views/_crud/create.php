<?php

$this->title = Yii::t('app', 'New ...');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '_'), 'url' => ['/_']];
?>

<div class="--create">

    <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

</div>
