<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;

$this->title = Yii::t('app', 'Contact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/contact']];


$model = $this->context->getModel();
$detailModels = $this->context->getDetailModels();
?>

<?= Elements::header($model->heading, ['class' => 'huge', 'style' => 'font-weight: 500']) ?>
<?= Html::tag('p', Html::encode($model->shortIntro)) ?>

<?= Html::tag('p', Html::encode($model->enquiryDetail)) ?>

<?php
if (! (bool) $model->hideContactForm) :
endif ?>