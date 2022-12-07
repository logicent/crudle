<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="ui positive message">
            <?= Yii::t('app', 'Hey, thank you for contacting us. <br>We will respond to your message as soon as possible.') ?>
        </div>
    <?php else: ?>
        <p>
            <?= Yii::t('app', 'If you have enquiries or other questions, please fill out the form below to contact us.') ?>
            <br><?= Yii::t('app', 'Thank you.') ?>
        </p>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']) ?>
        <?= $this->render('@appMain/layouts/_form/_header', ['model' => $model]) ?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'subject') ?>
        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                'template' => <<<HTML
                    <div class="ui column grid">
                        <div class="three wide column">{image}</div>
                        <div class="six wide column">{input}</div>
                    </div>
                HTML,
            ]) ?>
        <?php ActiveForm::end() ?>
    <?php endif ?>
</div>