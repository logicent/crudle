<?php

$this->title = $person->firstname .' '. $person->surname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$this->params['person'] = $person;

?>

<div class="person-update">

    <?= $this->render('_form', [
        'auth' => $auth,
        'person' => $person,
    ]) ?>

</div>
