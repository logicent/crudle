<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Print Style');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Style'), 'url' => ['index']];
?>

<div class="print-style-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
