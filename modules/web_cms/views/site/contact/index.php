<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;

$this->title = Yii::t('app', 'Contact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/contact']];


$model = $this->context->getModel();
// $detailModels = $this->context->getDetailModels();
?>

<div class="ui inverted vertical center aligned segment">
    <?= $this->render('@extModules/web_cms/views/_layouts/site/_navbar') ?>
</div>

<div class="ui vertical stripe segment">
    <div class="ui text container">
    <?= Elements::header($model->heading, ['class' => 'huge', 'style' => 'font-weight: 500']) ?>
    <?= $model->shortIntro ?>

    <div style="font-family: Ubuntu mono, Monospace"><?= $model->enquiryDetail ?></div>

    <?php
    if (! (bool) $model->hideContactForm) :
    endif ?>
    </div>
</div>