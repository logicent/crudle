<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'New Print Format');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Print Format'), 'url' => ['index']];
?>

<div class="print-format-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
