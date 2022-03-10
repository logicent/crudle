<?php

$this->title = Yii::t('app', 'New Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

?>

<div class="role-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
