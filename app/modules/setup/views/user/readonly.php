<?php

use yii\helpers\Html;

$this->title = $person->firstname .' '. $person->surname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setup'), 'url' => ['/setup']];

$this->params['person'] = $person;

?>

<div class="person-read">

    <?= $this->render('_form', [
        'auth' => $auth,
        'person' => $person,
    ]) ?>

</div>
