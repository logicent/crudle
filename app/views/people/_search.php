<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\auth\PersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'ui form',
            'autocomplete' => 'off'
        ]
    ]); ?>

    <div class="four fields">
        <?= $form->field($searchModel, 'sex') ?>
        <?= $form->field($searchModel, 'mobile_no') ?>
        <?= $form->field($searchModel, 'official_status') ?>
        <?php //= $form->field($searchModel, 'last_login_ip') ?>
    </div>

    <!-- <div class="four fields"> -->
        <?php //= $form->field($searchModel, 'last_login_at') ?>
        <?php //= $form->field($searchModel, 'logged_on') ?>
    <!-- </div> -->

    <?= Html::resetButton(Yii::t('app', 'Clear'), ['class' => 'compact ui basic small button']) ?>
    <?= Html::submitButton(Yii::t('app', 'Apply Filter'), ['class' => 'compact ui basic small primary button']) ?>

    <?php ActiveForm::end(); ?>

</div>
