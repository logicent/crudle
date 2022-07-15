<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Checkbox;
use Zelenin\yii\SemanticUI\modules\Select;

$model = $this->context->model;
?>

<div class="ui form">
    <div class="field">
        <?= Html::activeLabel($model, 'date_published') ?>
        <?= Html::activeTextInput($model, 'date_published', [
                'class' => 'pikaday',
                'readonly' => true,
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