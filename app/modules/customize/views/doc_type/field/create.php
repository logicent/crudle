<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocTypeField */

$this->title = Yii::t('app', 'New Field');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-type-field-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
