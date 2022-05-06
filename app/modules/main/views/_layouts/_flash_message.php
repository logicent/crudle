<?php

use yii\helpers\Html;
// use crudle\app\assets\SweetAlertAsset;

// SweetAlertAsset::register($this);

if (Yii::$app->session->hasFlash('warning')) : ?>
  <div class="ui warning message disappear">
    <i class="close icon"></i>
    <div class="header">
      <?= Yii::$app->session->getFlash('warning') ?>
    </div>
    <p><?= Yii::$app->session->getFlash('description') ?></p>
  </div>
<?php
endif;

if (Yii::$app->session->hasFlash('info')) : ?>
  <div class="ui info message disappear">
    <i class="close icon"></i>
    <div class="header">
      <?= Yii::$app->session->getFlash('info') ?>
    </div>
    <p><?= Yii::$app->session->getFlash('description') ?></p>
    <!-- <ul class="list">
        <li>Did you know it's been a while?</li>
      </ul> -->
  </div>
<?php
endif;

if (Yii::$app->session->hasFlash('success')) : ?>
  <div class="ui positive message disappear">
    <!-- <i class="check icon"></i> -->
    <div class="header">
      <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <p><?= Yii::$app->session->getFlash('description') ?></p>
  </div>
<?php
endif;

if (Yii::$app->session->hasFlash('error')) : ?>
  <div class="ui negative message disappear">
    <!-- <i class="check icon"></i> -->
    <div class="header">
      <?= Yii::$app->session->getFlash('error') ?>
    </div>
    <p><?= Yii::$app->session->getFlash('description') ?></p>
  </div>
<?php
endif;

if (Yii::$app->session->hasFlash('errors')) : ?>
  <div class="ui negative message disappear">
    <!-- <i class="close icon"></i> -->
    <div class="content">
      <div class="header">
        <?= $this->title ?>
      </div>
      <ul class="list">
      <?php
        $messages = '';
        $errors = Yii::$app->session->getFlash('errors');

        foreach ($errors as $key => $error) :
            $messages .= Html::tag('li', $error[0]);
        endforeach;

        echo $messages;
        ?>
      </ul>
    </div>
  </div>
<?php
endif;

// $flashDuration = Yii::$app->params['flashMessageDuration'];

$this->registerJs(<<<JS
  $('.message .close')
      .on('click', function() {
          $(this).closest('.message').transition('fade');
  });
  $('.message.disappear').transition('fade', '8000ms');

  // yii.confirm = function (message, ok, cancel)
  // {
  //     swal({
  //         title: 'Warning',
  //         text: message,
  //         icon: 'warning',
  //         buttons: true,
  //         dangerMode: true,
  //     })
  //     .then((willDelete) => {
  //         if (willDelete) {
  //             !ok || ok();
  //         } else {
  //             !cancel || cancel();
  //         }
  //     });
  //     return false;
  // }
JS) ?>