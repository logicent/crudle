<?php

use yii\helpers\Html;

$this->title = $person->firstname .' '. $person->surname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $auth->email, 'url' => ['read', 'id' => $auth->id]];

$this->params['person'] = $person;

?>

<div class="person-update">

    <?= $this->render('_form', [
        'auth' => $auth,
        'person' => $person,
    ]) ?>

</div>
