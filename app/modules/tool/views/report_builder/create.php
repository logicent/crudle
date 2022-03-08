<?php

$this->title = Yii::t('app', 'New Report Builder');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
?>

<div class="report-builder-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
