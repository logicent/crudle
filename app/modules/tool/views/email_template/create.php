<?php

$this->title = Yii::t('app', 'New Email Template');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tool'), 'url' => ['/tool']];
?>

<div class="email-template-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
