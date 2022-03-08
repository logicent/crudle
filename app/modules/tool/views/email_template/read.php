<?php

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
?>
<div class="email-template-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
