<?php

$this->title = Yii::t('app', 'New Print Style');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
?>

<div class="print-style-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
