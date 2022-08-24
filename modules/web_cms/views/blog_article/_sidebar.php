<?php

use yii\helpers\Html;
use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;
use icms\FomanticUI\modules\Select;

$model = $this->context->model;
?>

<div class="ui form">
    <div class="field">
        <?= Html::activeHiddenInput($model, 'featured_image') ?>
        <?php //= Html::activeLabel($model, 'featured_image') ?>
        <?= Elements::image(Yii::getAlias('@web/img/placeholder-image.jpg')) ?>
    </div>
    <div class="field">
        <?= Html::activeLabel($model, 'date_published') ?>
        <?= Html::activeTextInput($model, 'date_published', [
                'class' => 'pikaday',
                'readonly' => true,
            ]) ?>
    </div>
    <div class="field">
        <?= Html::activeLabel($model, 'category_id') ?>
        <?= Select::widget([
                'model' => $model,
                'attribute' => 'category_id',
                'items' => [
                ],
                'search' => true
            ]) ?>
    </div>
    <div class="field">
        <?= Html::activeLabel($model, 'tags') ?>
        <?= Html::activeTextarea($model, 'tags', [
                'maxlength' => true,
                'rows' => 2,
                'style' => 'resize:none',
            ]) ?>
    </div>
</div>
