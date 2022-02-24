<?php

$this->title = Yii::t('app', 'New User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
?>

<div class="person-create">

    <?= $this->render('_form', [
        'auth' => $auth,
        'person' => $person,
    ]) ?>

</div>
