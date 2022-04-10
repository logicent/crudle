<?php

use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Checkbox;

?>
<div class="ui two column stackable grid">
    <div class="column">
        <?= Html::activeTextInput($model, "[{$rowId}]label", ['maxlength' => true]) ?>
        <?= Html::activeTextInput($model, "[{$rowId}]route", ['maxlength' => true]) ?>
        <?= Html::activeTextInput($model, "[{$rowId}]group", ['maxlength' => true]) ?>
        <?= Checkbox::widget([
                'name' => "[{$rowId}]inactive",
                'options' => ['style' => 'vertical-align: text-top']
            ]) ?>
    </div>
    <div class="column">
        <?= Html::activeHiddenInput($model, "[{$rowId}]icon") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]icon_path") ?>
        <?= Html::activeHiddenInput($model, "[{$rowId}]icon_color") ?>
    </div>
</div>