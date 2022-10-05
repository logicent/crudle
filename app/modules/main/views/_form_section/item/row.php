<?php

use icms\FomanticUI\Elements;
use icms\FomanticUI\modules\Checkbox;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$fieldViewPath = '@appMain/views/_form_field';
$modelName = StringHelper::basename($modelClass);
$tableSubview = Inflector::underscore($modelName);
?>
<tr>
    <td class="center aligned select-row">
        <?= Html::activeHiddenInput($model, "[$rowId]id") ?>
        <?= Html::activeHiddenInput($model, "[$rowId]$parentAttribute") ?>
        <?= Checkbox::widget([
                'name' => "[$rowId]id",
                'options' => ['style' => 'width: 17px; vertical-align: text-top']
            ]) ?>
    </td>
    <?= $columns ?>
    <td class="center aligned">
        <?= Elements::button(Elements::icon('horizontal ellipsis'),
                [
                    'class' => 'compact basic icon edit-row',
                    'data' => [
                        'url' => Url::to(['edit-row', 'id' => $model->id]),
                        'model-id' => $model->id,
                        'model-class' => $modelClass,
                        'form-view' => "$tableSubview/field_inputs",
                    ]
                ]
            ) ?>
    </td>
</tr>